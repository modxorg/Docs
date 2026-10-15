---
title: "modRegistry"
_old_id: "372"
_old_uri: "2.x/developing-in-modx/advanced-development/modx-services/modregistry"
---

## What is modRegistry?

modRegistry is a message queue service in the MODX core. It ships with a file-based and a database modRegister implementation and can be extended for custom or external queue backends.

A registry holds any number of registers. Within a register you subscribe to topics, then send messages to a topic and read them from it.

<!-- MEDIA: diagram | must | The message path: a registry holds registers, a register holds topics, a subscriber subscribes to a topic, then sends messages to it and reads them back | Draw it from the two paragraphs above -->

## Choosing a modRegister implementation

MODX ships with two modRegister implementations: one file-based, one backed by database tables.

### modFileRegister

This file-based register reads and writes messages, by default, to files under the `registry/` folder in the MODX `cache_path` location. It suits single-server deployments without heavy traffic, where several requests might otherwise write and read the same topic simultaneously.

Here is how you would add a specific file-based register named _food_:

``` php
<?php
$modx->getService('registry', 'registry.modRegistry');
$modx->registry->addRegister('food', 'registry.modFileRegister', array('directory' => 'food'));
```

::: warning
Clearing the cache manually by deleting all files and folders under `core/cache/` deletes existing modFileRegister messages as well.
:::

### modDbRegister

Choose the database implementation for higher message volumes, or when messages must be shared across a load-balanced set of web server nodes.

Here is how you would add a specific database register named _food_:

``` php
<?php
$modx->getService('registry', 'registry.modRegistry');
$modx->registry->addRegister('food', 'registry.modDbRegister', array('directory' => 'food'));
```

<!-- MEDIA: table | nice | The two modRegister implementations side by side: where each stores messages, the traffic it suits, and its limits — the file register loses messages when you clear core/cache by hand | Pull the criteria from the two subsections above -->

## Using the Registry API

### Registry service methods

Besides `addRegister()`, the modRegistry service itself offers:

- `getRegister($key, $class, array $options = array())` — get an existing register (or create it if missing);
- `removeRegister($key)` — remove a register from the registry;
- `setLogging(modRegister &$register, $topic, $level = modX::LOG_LEVEL_ERROR, $clear = false)` — route log messages into a register topic (see the "Capturing Log Messages" example below);
- `resetLogging()` — stop routing log messages to a register;
- `isLogging()` — whether log routing is currently active.

### Register methods

Each modRegister instance (file or database) provides, beyond `connect()`, `subscribe()`, `read()` and `send()` used below:

- `close()` — close the register connection;
- `clear($topic)` — remove all messages in a topic;
- `unsubscribe($topic)` — remove a topic from the subscriptions;
- `setCurrentTopic($topic)` / `getCurrentTopic()` — inspect or change the current topic;
- `begin($transactionKey)`, `commit($transactionKey)`, `abort($transactionKey)` — group sends into a transaction;
- `acknowledge($messageKey, $transactionKey)` — acknowledge a message within a transaction;
- `getKey()` — the register's key.

<!-- MEDIA: table | must | The service methods and the register methods as reference tables: signature, arguments, purpose | Turn the two bullet lists above into tables -->

### Connecting

Connect to the register before you use it:

``` php
<?php
$connected = $modx->registry->food->connect();
```

If the connection fails, the return value is `false`.

### Subscribing

Subscribing makes a topic available for sending and reading:

``` php
<?php
$modx->registry->food->subscribe("/beer/");
```

The topic `/beer/` is added to your subscriptions and becomes the current topic. Topics work like relative URIs: a leading slash starts from the root of the register, without one you subscribe relative to the current topic. Once you subscribe to at least one topic, you can send and read messages from it at will.

### Sending Messages

#### Sending an Array of Sequenced Messages

Messages sent as a plain array are read back in the same order:

``` php
<?php
$modx->registry->food->send("/beer/", array("beer1", "beer2", "beer3"));
```

#### Sending an Array of Named Messages

An associative array sends messages under your own keys:

``` php
<?php
$modx->registry->food->send("/beer/", array("Heineken" => "not so good", "Pabst Blue Ribbon" => "rocks", "Molson Golden" => "ok for Canadian beer"));
```

These messages will be read in ascending alphabetic order, or specifically by key.

#### Sending a Single Message

A single message without a key gets a time-based key from the register, so it is read in the correct time order:

``` php
<?php
$modx->registry->food->send("/beer/", "It's Miller Time!", array('kill' => true));
```

The _kill_ option tells message consumers to stop reading any further messages once a message with this option is read.

#### Options for Sending Messages

| Option | Meaning |
|---|---|
| `delay` | Seconds before the message becomes readable; only for time-based messages (no keys). The message reaches the queue immediately but stays unreadable until the delay expires. |
| `ttl` | Seconds the message stays valid in the queue. A message past its TTL is left out of `read()` results. |
| `kill` | When a consumer reads a message with this option, it stops reading the queue, whatever other read options say. |

### Reading Messages

Reading options are passed to the `read()` method.

#### Polling for New Messages in a Topic

Poll once for up to 5 new messages in the current topic (`/beer/`):

``` php
<?php
$msgs = $modx->registry->food->read(array(
    'poll_limit' => 1,
    'msg_limit' => 5
));
```

The result is an array of messages in read order, without message keys unless `include_keys` asks for them.

#### Options for Reading Messages

| Option | Default | Meaning |
|---|---|---|
| `poll_limit` | polls until `msg_limit`, `time_limit` or a `kill` message | Number of poll attempts. Set it to `1` in web requests: a single check runs and the read ends regardless of `msg_limit`/`time_limit`. Larger values suit a PHP poller (e.g. in a cronjob) that loops until messages arrive. |
| `poll_interval` | `0` | Seconds to wait between polls for new messages. |
| `time_limit` | — | Maximum seconds to keep polling when `poll_limit` is greater than 1. |
| `msg_limit` | `5` | Maximum number of messages to read from the queue. |
| `remove_read` | — | Remove each message from the queue when it is read. |
| `include_keys` _(MODX 2.2+)_ | `false` | Return message keys along with the messages; otherwise you get a plain ordered array of messages. |

## Using the Registry Processors

Besides the raw API, MODX ships connectors and processors for a register topic; components call them with `runProcessor`, and AJAX requests go through the connectors.

### Sending Messages

Parameters of the `system/registry/register/send` processor; pass them to `runProcessor` or via request variables to the connector:

| Parameter | Required | Description |
|---|---|---|
| `register` | yes | Name of the register to send a message to. |
| `topic` | yes | Topic within the register. |
| `register_class` | no | modRegister implementation; default `registry.modFileRegister`. |
| `message` | yes | Message to send; an empty message fails the processor. With `message_format` set to `json`, multiple messages can be sent. |
| `message_key` | no | Key for a named message (MODX 2.2+); empty gives a sequenced timestamp key. |
| `message_format` | no | Default `string`; with `json` (MODX 2.2+) the message is converted to PHP before sending, so several or structured messages fit in one call. |
| `delay` | no | Seconds the message stays unreadable (time-based messages only); default `0`. |
| `ttl` | no | Seconds the message stays valid in the queue; default `0` (no expiry). |
| `kill` | no | Reading this message stops the consumer; default `false`. |

There is also an API-level option: a direct `send()` call accepts `message_type` to influence how the payload is stored (see the `modRegister::send()` docblock for details).

### Reading Messages

The `system/registry/register/read` processor runs the same way, via `runProcessor` or the connector:

| Parameter | Required | Description |
|---|---|---|
| `register` | yes | Name of the register to read from. |
| `topic` | yes | Topic within the register. |
| `register_class` | no | modRegister implementation; default `registry.modFileRegister`. |
| `format` | no | Default `json` (MODX 2.2+): messages as a JSON string, handy for AJAX. `html_log` treats them as xPDO/modX log messages formatted for HTML (modExt consoles). Any other value returns a PHP array. |
| `poll_limit` | no | Poll attempts before exiting; default `1`. |
| `poll_interval` | no | Seconds between poll attempts; default `1`. |
| `time_limit` | no | Seconds to keep polling; default `10`. |
| `message_limit` | no | Maximum messages returned; default `200`. |
| `remove_read` | no | Remove returned messages from the queue; default `true`. |
| `include_keys` | no | Return message keys with the messages (MODX 2.2+); default `false`. |
| `show_filename` | no | Add the filename to `html_log` messages; default `false`. |

## Examples

### Alternative to Session Storage

A register topic stores data independently of session state, so it stays readable after the state changes. Custom registration flows need this: data written before an unauthorized user logs in must survive the new session.

Write a named message into a topic for retrieval by key later:

``` php
<?php
$modx->getService('registry', 'registry.modRegistry');
$modx->registry->addRegister('login', 'registry.modFileRegister', array('directory' => 'login'));
$modx->registry->login->connect();
$modx->registry->login->subscribe('/useractivation/');
$modx->registry->login->send('/useractivation/',array($user->get('username') => $pword),array(
    'ttl' => ($modx->getOption('activationttl',$scriptProperties,180)*60),
));
```

And to retrieve the specific message later:

``` php
<?php
$modx->getService('registry', 'registry.modRegistry');
$modx->registry->addRegister('login','registry.modFileRegister');
$modx->registry->login->connect();
$modx->registry->login->subscribe('/useractivation/'.$user->get('username'));
$msgs = $modx->registry->login->read(array('poll_limit' => 1));
$password = reset($msgs);
```

### Capturing Log Messages

Set `logTarget` to a modRegister instance and every log message goes into the register, where you can read it later for user feedback, audit views, and similar needs.

``` php
<?php
$modx->getService('registry', 'registry.modRegistry');
$modx->registry->addRegister('logging', 'registry.modFileRegister', array('directory' => 'logging'));
$modx->registry->logging->connect();
$modx->registry->logging->subscribe($topic);

/* set the logTarget to the register instance */
$oldTarget = $modx->setLogTarget($modx->registry->logging);

/* code here that sends log messages */

/* set the old target back */
$modx->setLogTarget($oldTarget);
```

### Registering Load Balanced Web Nodes for Remote Commands

This example uses two plugins to refresh caches across web nodes that each run their own local file cache.

The first plugin, on `OnWebPageComplete`, registers its server instance for 20 minutes and then polls for a `clearCache` command. The second plugin, on `OnSiteRefresh`, broadcasts `clearCache` to every registered instance when you refresh the cache in the manager. The 20-minute TTL suits environments where instances launch and stop on demand; remove it to skip the overhead of writing those messages every 20 minutes.

In practice, keep the manager on its own instance (a separate subdomain, for example), away from the public web nodes. Heavy manager traffic then stays isolated, and changes reach the web nodes only when someone runs Refresh site.

<!-- MEDIA: diagram | must | Two web nodes and the manager around one database register: each node publishes its instance with a limited lifetime, a cache refresh in the manager writes a clearCache command for every instance, each node reads its command and refreshes its local cache | Draw the flow described above; take the register and topic names from the plugin code below -->

The remotecommands plugin (`OnWebPageComplete`):

``` php
<?php
/* RemoteCommands plugin -- register with OnWebPageComplete event */

/* find any remote commands to execute from the master instance */
$instance = $_SERVER['SERVER_ADDR'];
if (!empty($instance) && $modx->getService('registry', 'registry.modRegistry')) {
    $modx->registry->addRegister('remotes', 'registry.modDbRegister', array('directory' => 'remotes'));
    $modx->registry->remotes->connect();

    /* register this instance */
    $modx->registry->remotes->subscribe("/distrib/instances/");
    $modx->registry->remotes->send("/distrib/instances/", array($instance => true), array('ttl' => 1440));

    /* find any valid command messages for this instance and act on them */
    $modx->registry->remotes->subscribe("/distrib/commands/{$instance}/");
    $commands = $modx->registry->remotes->read(array('poll_limit' => 1, 'msg_limit' => 1));
    if (!empty($commands)) {
        $command = reset($commands);
        if (!empty($command)) {
             switch ($command) {
                 case 'clearCache':
                    $modx->cacheManager->refresh();
                    break;
             }
        }
    }
}
```

The sendclearcache plugin broadcasts the command to each registered instance:

``` php
<?php
/* SendClearCache plugin -- register with OnSiteRefresh event */

/* read instances and write clear cache msg to each command directory */
if ($modx->getService('registry', 'registry.modRegistry')) {
    $modx->registry->addRegister('remotes', 'registry.modDbRegister', array('directory' => 'remotes'));
    $modx->registry->remotes->connect();
    $modx->registry->remotes->subscribe('/distrib/instances/');
    $instances = $modx->registry->remotes->read(array('poll_limit' => 1, 'msg_limit' => 25, 'remove_read' => false));
    if (!empty($instances)) {
        foreach ($instances as $instance) {
            if ($instance == $_SERVER['SERVER_ADDR']) continue;
            $modx->registry->remotes->subscribe("/distrib/commands/{$instance}/");
            $modx->registry->remotes->send("/distrib/commands/{$instance}/", 'clearCache', array('ttl' => 1440));
        }
    }
}
```

Other remote commands travel the same way: handle them in the switch statement of the RemoteCommands plugin.

---
title: "modRegistry"
_old_id: "372"
_old_uri: "2.x/developing-in-modx/advanced-development/modx-services/modregistry"
---

## What is modRegistry?

The modRegistry service provided with the MODX Revolution Core is a simple message queue service that developers can make use of for a wide variety of purposes. It comes with a file and database modRegister implementation, and can be extended to work with custom or external message queue implementations.

The modRegistry service can connect to any number of unique registers. Within each register, specific topics are subscribed to and messages can then be sent or read from the topic.

## Choosing a modRegister implementation

MODX ships with two simple modRegister implementations. One is file-based and one uses database tables for storage. Each has benefits and limitations that you should consider before determining which one to use for a specific purpose.

### modFileRegister

This file-based register reads and writes messages, by default, to files under the `registry/` folder in the MODX `cache_path` location. This is great for single-server deployments that do not have high-traffic requirements where writing and reading to the the same topics might occur simultaneously from multiple client requests.

Here is how you would add a specific file-based register named _food_:

``` php
<?php
$modx->getService('registry', 'registry.modRegistry');
$modx->registry->addRegister('food', 'registry.modFileRegister', array('directory' => 'food'));
```

**Be Careful!** 
 Clearing the cache manually by deleting all files and folders under `core/cache/` will delete any existing modFileRegister messages as well.

### modDbRegister

When reading and writing is expected to reach higher volumes, or you need messages shared across a load-balanced environment with multiple web server nodes, you would want to choose the database-powered modRegister implementation.

Here is how you would add a specific database register named _food_:

``` php
<?php
$modx->getService('registry', 'registry.modRegistry');
$modx->registry->addRegister('food', 'registry.modDbRegister', array('directory' => 'food'));
```

## Using the Registry API

The modRegistry service provides a very simple API for working with Registers, subscribing to topics, and sending/reading messages within them.

### Connecting

Once you have obtained the modRegistry and initialized a modRegister implementation of your choice, you can now attempt to make a connection to your queue. Here is how you would connect to the _food_ register we added in the examples above.

``` php
<?php
$connected = $modx->registry->food->connect();
```

If there is any problem connecting to the register instance, the return value will be `false`.

### Subscribing

Once you make a successful connection, it is time to subscribe to a topic for relevant messages to be sent or read. Let's subscribe to a nice topic about _beer_ in our _food_ register:

``` php
<?php
$modx->registry->food->subscribe("/beer/");
```

This adds the topic "/beer/" to your subscriptions and sets it as the current topic. Topics are similar to relative URI's. If you specify a slash at the beginning, you are subscribing to a topic from the root of the register. No initial slash would indicate you want to subscribe to a sub-topic of the current topic. Once subscribed to at least one topic, you are free to send and read messages from them at will.

### Sending Messages

You can send messages to a topic in multiple ways. They can be sent as an array of sequenced messages (ordered by time sent and the array keys provided), named messages ordered by key (by providing associative array keys), or as a single message that automatically gets a time stamp.

#### Sending an Array of Sequenced Messages

Let's say we wanted to send three messages that should be read in the same order as they were sent. We simply provide an array of those messages in the order to read them in:

``` php
<?php
$modx->registry->food->send("/beer/", array("beer1", "beer2", "beer3"));
```

#### Sending an Array of Named Messages

You can also provide an associative array to send messages with specific keys that will be read according to the order of the keys:

``` php
<?php
$modx->registry->food->send("/beer/", array("Heineken" => "not so good", "Pabst Blue Ribbon" => "rocks", "Molson Golden" => "ok for Canadian beer"));
```

These messages will be read in ascending alphabetic order, or specifically by key.

#### Sending a Single Message

Sometimes it is necessary to send a single message without a specific key. The MODX register will automatically provide a time-based key for the message so that it is read in a proper time-based order.

``` php
<?php
$modx->registry->food->send("/beer/", "It's Miller Time!", array('kill' => true));
```

The _kill_ option tells message consumers to stop reading any further messages once a message with this option is read.

#### Options for Sending Messages

##### delay

Only supported for time-based messages (no keys provided), this option specifies the number of seconds to delay the message before it can be read. The message is still sent immediately to the queue, but is not available for reading until the specified delay has expired.

##### ttl

The _time to live_ option specifies how many seconds the message(s) remain valid in the queue. Once a message has outlived it's ttl, it will not be included in the messages returned by a `read()` operation.

##### kill

If specified, when a message consumer reads a message with this option set, no further messages will be read from the queue, regardless of any other read options.

### Reading Messages

You can also read messages from a topic in a variety of ways using options passed to the `read()` method.

#### Polling for New Messages in a Topic

The most common use of the registry is to look for up to x number of new messages in any subscribed topics. Here we are polling once for up to 5 new messages in the current topic, which is "/beer/":

``` php
<?php
$msgs = $modx->registry->food->read(array(
    'poll_limit' => 1,
    'msg_limit' => 5
));
```

This returns an array of the messages sent to the queue in the order they are read, without the corresponding message keys, regardless if they were specified when sent.

#### Options for Reading Messages

##### poll\_limit

By default, a modRegister will attempt to poll for messages until the msg\_limit, time\_limit, or a message with the kill option is encountered. In most situations when using the modRegister in web requests, this is not desirable. Most cases will want to set this option to 1, so the read operation only checks the queue once for messages and moves on regardless if the msg\_limit or time\_limit is hit. This option is useful if you want to set up a simple PHP polling server that checks for messages and takes action based on them (e.g. in a cronjob).

##### poll\_interval

A configurable delay to wait between polling for new messages, in seconds. Default is unlimited.

##### time\_limit

The maximum number of seconds to poll for new messages when multiple poll attempts are configured (i.e. poll\_limit != 1).

##### msg\_limit

The maximum number of messages to read from the queue. The default is 5 messages.

##### remove\_read

Indicates if the message should be removed when it is read.

##### include\_keys _(MODX 2.2+ only)_

Indicates if the read operation should include the message keys. If not true, only the messages are returned in a simple, ordered array.

## Using the Registry Processors

In addition to the raw API, MODX also provides connectors and processors for sending messages to and reading messages from a register topic. These can be easily utilized by components using the runProcessor method or by AJAX requests via the connectors.

### Sending Messages

There are several parameters that control the behavior of the `system/registry/register/send` processor, which is used to send a message or multiple messages to a specific register topic. These parameters can be passed to the runProcessor method as properties or passed to the processor via REQUEST variables from the connector.

- **register** _(required)_ — The name of the register to send a message to.
- **topic** _(required)_ — The topic to send a message to within the specified register.
- **register\_class** _(optional)_ — Specifies the modRegister implementation to use; default is `registry.modFileRegister`.
- **message** _(optional)_ — The message(s) to send to the register topic. In MODX 2.2+, multiple messages can be sent using `json` as the **message\_format**.
- **message\_key** _(optional, MODX 2.2+)_ — An optional message key that can be provided to send a named message to the topic. If empty, the message is given a sequenced timestamp as the key.
- **message\_format** _(optional, MODX 2.2+)_ — Default is string, which just sends the message as a string. If this is set to `json`, the message is converted to PHP before being sent, allowing multiple or more complex messages to be sent.

### Reading Messages

Reading messages with the `system/registry/register/read` processor can also be accomplished via runProcessor or the connector. Following are the parameters for reading.

- **register** _(required)_ — The name of the register to send a message to.
- **topic** _(required)_ — The topic to send a message to within the specified register.
- **register\_class** _(optional)_ — Specifies the modRegister implementation to use; default is `registry.modFileRegister`.
- **format** _(optional, MODX 2.2+)_ — If specified as `json`, the messages are converted to JSON before being returned; esp. useful for AJAX requests. If specified as `html_log`, the messages are assumed to be xPDO/modX log messages and are formatted for HTML output; useful for modExt consoles. By default, the messages are returned as an array.
- **poll\_limit** _(optional)_ — The number of times to poll for new messages before exiting; default is 1.
- **poll\_interval** _(optional)_ — The number of seconds to delay each poll attempt for new messages before exiting; default is 1.
- **time\_limit** _(optional)_ — The number of seconds to continue polling for new messages before exiting; default is 10.
- **message\_limit** _(optional)_ — The maximum number of messages to return; default is 200.
- **remove\_read** _(optional)_ — Indicates if returned messages should be removed from the queue; default is true.
- **include\_keys** _(optional, MODX 2.2+)_ — Indicates if returned messages should include the message keys; default is false.
- **show\_filename** _(optional)_ — Indicates if html\_log formatted messages should include the filename; default is false.

## Examples

### Alternative to Session Storage

There might be times that session storage is not appropriate for persisting personalized information. In these cases, you could use a register topic to store the data and retrieve it, regardless of the user's session state. This might be useful for custom registration systems where unauthorized users are turned into authorized users and you need access to data stored before the new authorized user's session was started (i.e. they logged in).

You might write a named message into a topic for retrieval by key at a later time, as done in the Login Add-On for useractivation:

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

MODX supports specifying the logTarget as a modRegister instance. This allows you to capture all log messages a message queue where you can read them later to provide user feedback, audit views, etc.

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

This example solution using modRegistry uses two plugins to help manage cache refresh operations across multiple web nodes, each using it's own local file cache.

The first, which is attached to OnWebPageComplete, registers each server instance for 20 minutes (this was designed for a cloud deployment that would launch and kill new server instances on demand, but you can remove the expiration time to avoid the overhead of writing those messages every 20 minutes) and then looks for any messages with the command 'clearCache' specified. The second, attached to the OnSiteRefresh event allows clearing the cache in the manager to register a 'clearCache' message with all of the remote server 'instances' that have been registered by the first plugin. You can take the idea and tailor it for your environment, but in our experience the best practice is to isolate one server instance for the manager (via subdomain configuration or similar) that is separate from your remote web nodes. This allows activity to take place on the manager instance in high volume, then changes only get pushed out when the Refresh site action is taken from the Admin menu.

Here is an example remotecommands plugin (NOTE this is for MODX 2.1, and 2.0 would be slightly different, using clearCache() instead of refresh()):

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
    $modx->registry->remotes->send("/distrib/instances/", array($instance => true), array('expires' => time() + 1440));
 
    /* find any valid command messages for this instance and act on them */
    $modx->registry->remotes->subscribe("/distrib/commands/{$instance}/");
    $commands = $modx->registry->remotes->read(array('poll_limit' => 1, 'msg_limit' => 1));
    if (!empty($commands)) {
        $command = reset($commands);
        if (!empty($command)) {
             switch ($command) {
                 case 'clearCache':
                    $results= $modx->cacheManager->refresh();
                    break;
                 default:
                    break;
             }
        }
    }
}
```

And here is an example sendclearcache plugin for registering a remote command message to each remote server instance:

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
            $modx->registry->remotes->send("/distrib/commands/{$instance}/", 'clearCache', array('expires' => time() + 1440));
        }
    }
}
```

Other remote commands could also be sent and processed in this way. You would simply implement handling for additional commands in the switch statement in the RemoteCommands plugin.
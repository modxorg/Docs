---
title: "Using Memcache"
_old_id: "283"
_old_uri: "2.x/developing-in-modx/advanced-development/caching/setting-up-memcache-in-modx"
---

## Requirements

- A running memcached server and the address it listens on
- The [PHP memcached extension](https://www.php.net/manual/en/book.memcached.php) on the server running MODX

::: warning
The extension is named `memcached`, not `memcache`. The latter was removed in PHP 7 and MODX 3.x requires PHP 8.1 or newer, so no supported installation has it.
:::

## Setting up Memcache in MODX

Go to System Settings and set **cache_handler** to **xPDO\Cache\xPDOMemCached**.

The value is the full namespaced class name. The dot-separated form `cache.xPDOMemCache` from MODX 2.x no longer resolves: the class cannot be loaded, the log records `Could not load class: cache.xPDOMemCache`, and the site keeps writing to files.

To point MODX at the memcached server, create the **default_memcached_server** system setting with a value like **localhost:11211**. Several servers are listed separated by commas: **server1.tld:11211,server2.tld:11211**.

Every partition reads its own counterpart setting, named after it — **resource_memcached_server**, **scripts_memcached_server**. A single **memcached_server** setting works as a shared default.

| Setting | Default | Purpose |
| --- | --- | --- |
| `cache_handler` | `xPDO\Cache\xPDOFileCache` | Cache handler class |
| `default_memcached_server` | `localhost:11211` | Address of the memcached server |
| `default_memcached_compression` | `true` | Whether to compress stored values |
| `cache_prefix` | — | Prefix prepended to every cache key |

## Why the setting may appear to have no effect

MODX builds the cache manager before it reads system settings from the database, because it needs a handler to read them. A `cache_handler` stored as a system setting therefore arrives too late: on the next request MODX still builds the file-based handler, and writes the settings cache to disk through it.

To take effect immediately, set the handler in `core/config/config.inc.php` instead:

``` php
$config_options = [
    'cache_handler' => 'xPDO\\Cache\\xPDOMemCached',
    'default_memcached_server' => 'localhost:11211',
];
```

Empty `core/cache/` afterwards, so the settings cache is rebuilt through the new handler.

## Sharing one server between several sites

If you run more than one MODX site against the same memcached instance, give each site its own **cache_prefix**, for example **site_a_**. Without it the sites overwrite each other's entries.

## See Also

- [Caching](extending-modx/caching "Caching") — core partitions and the settings that pick their handler

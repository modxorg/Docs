---
title: "Using Memcache"
_old_id: "283"
_old_uri: "2.x/developing-in-modx/advanced-development/caching/setting-up-memcache-in-modx"
---

## Requirements

First off, you'll need the following:

- A running memcached server, and the address it is running at
- The [PHP memcached extension](http://php.net/memcached), installed on the server running MODX

## Setting up Memcache in MODX

Go to System Settings, and change the "cache\_handler" system setting to "cache.xPDOMemCache".

If you have more than one MODX site on your server with cache.xPDOMemCache cache handler, you need to create new system setting "cache\_prefix" with a value like "yoursite\_" to differentiate cache keys for different sites.

If your memcached server is on a separate server, you can set the path to it with the System Setting "resource\_memcached\_server", with a value like "memcache.tld:121212"

## See Also

- [Caching](extending-modx/caching "Caching")

---
title: "Caching"
_old_id: "53"
_old_uri: "2.x/developing-in-modx/advanced-development/caching"
---

Caching in MODX is handled by the `modCacheManager` core class. It extends `xPDOCacheManager` and gives every partition its own cache handler; by default it writes to files in `core/cache/`.

If you have a custom MODX\_CONFIG\_KEY defined, the cache manager will write to core/cache/MODX\_CONFIG\_KEY/ instead.

## General Caching Terminology & Behavior

MODX splits cached data into **partitions**. A partition is, simplified, a folder in `core/cache/`; its value is that every partition can be assigned its own cache handler. **Cache handlers** are derivatives of the `xPDOCache` class and provide a unified API for storing, reading and removing cache entries.

MODX ships with these cache handlers:

| Class | Requires |
| --- | --- |
| `xPDO\Cache\xPDOFileCache` | Nothing. The default, writes to the file system |
| `xPDO\Cache\xPDOMemCached` | The PHP `memcached` extension |
| `xPDO\Cache\xPDORedisCache` | The PHP `redis` extension |
| `xPDO\Cache\xPDOWinCache` | The PHP `wincache` extension |

The source tree still contains `xPDO\Cache\xPDOAPCCache`, but it cannot initialize: it tests for `apc_exists()`, a function removed in PHP 7. Do not configure it.

::: warning
A handler that fails to initialize is replaced with `xPDOFileCache` and the site keeps working, so a misconfiguration is easy to miss. A class name that cannot be loaded writes `Could not load class: ...` at ERROR level to the MODX log — check the log after changing a handler. See [Using Memcache](extending-modx/caching/memcache).
:::

## MODX Core Cache Partitions

With the default cache configuration, every partition below is a directory in `core/cache/`.

| Partition | Contents |
| --- | --- |
| `auto_publish` | A unix timestamp with the next time a Resource needs to be automatically published or unpublished. See `modCacheManager::autoPublish()` |
| `context_settings` | Per Context: the resource map (parent and child IDs), alias map, Plugins used in the Context, and access policies |
| `db` | Used when the `cache_db` system setting is enabled; raw result sets for xPDO queries. See [Database caching](#database-caching) |
| `default` | The partition targeted by every `set()` call that passes no `xPDO::OPT_CACHE_KEY` — which is why your own cached data disappears when the site cache is cleared |
| `lexicon_topics` | The lexicon topic tree, used by the manager |
| `media_sources` | The MediaSource definitions |
| `menu` | Per manager language, a multi dimensional array of the manager top menu |
| `namespaces` | The Namespace index, including the packages installed through Extras |
| `packages` | Written by the package install and removal processors |
| `resource` | Per Context and Resource ID: the partial-page cache for Resources. Holds the meta data, the cached representation (`_content`) with uncached tags left intact, access policies, and the Elements used to process the Resource |
| `scripts` | The prepared source of Snippets and Plugins, written as executable PHP |
| `system_settings` | The global MODX configuration and system settings. Loaded first on every request; because alternative handlers for partitions are stored in system settings, this partition cannot be loaded from another handler that way |

Four more directories sit in `core/cache/` without being cache partitions:

- **includes** Holds the prepared PHP of static Snippets and Plugins, written by `modScript::loadScript()` for direct inclusion.
- **logs** Holds error.log, written by the file log target and managed by the Error Log processors.
- **registry** Used by `modFileRegister`, the file-based register the manager uses to pass data to processors.
- **rss** Used by SimplePie to cache the feeds behind the RSS dashboard widget.

Each partition is named by two system settings: `cache_PARTITION_key` holds the folder name, `cache_PARTITION_handler` the handler class. To change the handler of one partition, create a system setting named cache\_PARTITION\_handler — for example cache\_resource\_handler or cache\_scripts\_handler — and give it the class name of the handler you want. Context settings of the same name override system settings, so a partition can be moved to a different store for one Context only.

::: warning
`cache_resource_clear_partial` switches `refresh()` to clearing only the contexts you name, instead of the whole **resource** partition. It only takes effect when `cache_handler` is set to exactly `xPDOFileCache`; MODX compares the setting as a literal string, and its own default value is the namespaced `xPDO\Cache\xPDOFileCache`. In practice you must set both settings by hand, or the flag is ignored.
:::

### Database caching {#database-caching}

The **cache\_db** system setting makes xPDO cache the result sets it reads from the database, including those returned by `getObject()` and `getCollection()`. Leave it off unless database access costs more than an include from disk — a remote database server, or a setup where a caching system is already available.

The results go to the **db** partition, which takes part in `refresh()` like any other partition, and which you can point at a different handler:

| Setting | Default | Purpose |
| --- | --- | --- |
| `cache_db` | `false` | Whether database results are cached at all |
| `cache_db_key` | `db` | Partition the results are written to |
| `cache_db_handler` | inherits `cache_handler` | Handler class for the **db** partition |
| `cache_db_expires` | `0` | Lifetime of a stored result set, in seconds. `0` means until cleared |
| `cache_db_format` | `0` | Storage format. `0` executable PHP, `1` JSON, `2` serialized |

Do not confuse this with `xPDOCriteria::$cacheFlag`, which is a separate mechanism belonging to that class and has nothing to do with `cache_db`. See [xPDO Caching](extending-modx/xpdo/caching) for additional information.

## Refreshing the MODX Core Cache

To refresh any of the core MODX cache partitions, use the `modCacheManager->refresh()` method. The minimum call has no parameters and will refresh all core cache partitions.

``` php
$modx->cacheManager->refresh();
```

Alternatively, you can define a `$providers` array with partition `key => $partitionOptions` elements. The **context_settings** and **resource** partitions accept a `contexts` list; the others take no options.

``` php
// refresh the web and web2 context_settings only
$modx->cacheManager->refresh([
    'context_settings' => ['contexts' => ['web', 'web2']]
]);
```

The second parameter, `$results`, is passed by reference and holds the result of each partition. Most partitions report a boolean; **context_settings** reports one entry per Context instead. The method returns `false` if any partition reported exactly `false` — a partition returning `null` or `0` is not counted as a failure.

Every refresh also fires the **OnCacheUpdate** event with the `results`, `paths` and `options` properties.

## Programmatic (Custom) Caching {#programmatic-caching}

`modCacheManager` caches data of any type. Data written to a partition of your own can be moved to a memcached, Redis or WinCache instance through the `cache_PARTITION_handler` system settings, without changing a single call site.

`modCacheManager`, an `xPDOCacheManager` derivative, provides these methods:

- `add($key, &$var, $lifetime = 0, $options = array())`. Used for adding a value to the cache, but only if it does not yet exist or has expired.
- `replace($key, &$var, $lifetime = 0, $options = array())`. Used for replacing an existing cached value with a different one.
- `set($key, &$var, $lifetime = 0, $options = array())`. Used for setting a value in the cache no matter if it exists already (gets overwritten) or not (gets added).
- `delete($key, $options = array())`. Deletes a cached value from the cache.
- `get($key, $options = array())`. Gets a cached value from the cache.
- `clean($options = array())`. Flushes (empties) an entire cache provider. Make sure to define the xPDO::OPT\_CACHE\_KEY in the options array.
- `flushPermissions()`. Marks the permission data of all Users stale, so it is rebuilt on the next request.

::: warning
`add()`, `replace()` and `set()` declare `$var` by reference. Pass a literal straight to them — `$modx->cacheManager->set('k', 5)` — and PHP raises a fatal error. Assign to a variable first.
:::

The `$options` array selects the partition to write to, the handler to write through, and the default expiry time:

| Option | Purpose |
| --- | --- |
| `xPDO::OPT_CACHE_KEY` | The cache partition to write to |
| `xPDO::OPT_CACHE_HANDLER` | The cache handler to use. Leave it unset and let the cache\_PARTITION\_handler system setting pick the handler |
| `xPDO::OPT_CACHE_EXPIRES` | The default expiry time |

### Example 1: Simple Setting & Getting

``` php
$str = 'My test cached data.';
// Writes the data to the default cache partition with an expiry time of 2 hours.
$modx->cacheManager->set('testdata', $str, 7200);
// Gets the data from cache again. Returns null if cache is not available or expired.
$str = $modx->cacheManager->get('testdata');
```

### Example 2: Setting & Getting to a custom partition

``` php
$str = 'My test cached data.';
$options = array(
    xPDO::OPT_CACHE_KEY => 'mypartition',
);
// Writes the data to the mypartition partition with an expiry time of 2 hours.
$modx->cacheManager->set('testdata', $str, 7200, $options);
// Gets the data from cache again. Returns null if cache is not available or expired.
$str = $modx->cacheManager->get('testdata', $options);
```

## Replacing the Cache Manager

MODX resolves the cache manager from the **modCacheManager.class** system setting, falling back to the built-in `modCacheManager`. Point it at your own class to add partitions or change how `refresh()` behaves:

``` php
class MyCacheManager extends modCacheManager {
    public function refresh(array $providers = [], array &$results = []) {
        $cleared = parent::refresh($providers, $results);
        $this->modx->log(modX::LOG_LEVEL_INFO, 'Cache refresh finished.');

        return $cleared;
    }
}
```

## Note on Revolution 2.0

In MODX 2.0.x the cache system was quite different: the set of partitions differed, and system settings were stored in `core/cache/config.cache.php`. If you are still running MODX 2.0.x, spend more time on the upgrade than on this page.

`modCacheManager->clearCache()` still exists, but it has been deprecated since MODX 2.1 in favour of `refresh()`. Do not use it in new code.

## See Also

- [Basic Usage](extending-modx/caching/example) — writing and reading a value from a Snippet
- [Lifetimes](extending-modx/caching/lifetimes) — how long a cached value stays valid
- [Using Memcache](extending-modx/caching/memcache) — moving a partition to memcached
- [xPDO Caching](extending-modx/xpdo/caching) — caching inside xPDO itself

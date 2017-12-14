---
title: "Caching"
_old_id: "53"
_old_uri: "2.x/developing-in-modx/advanced-development/caching"
---

 By caching data that is being reused, a lot of database requests can be prevented, resulting in a better performance. MODX Revolution offers a number of different caching features on different levels within the application. The caching within MODX is mostly handled by the modCacheManager core class, which extends the xPDOCacheManager class and allows partition-specific cache handlers. The default implementation writes caches to files in the core/cache/ folder.

 If you have a custom MODX\_CONFIG\_KEY defined, the cache manager will write to core/cache/MODX\_CONFIG\_KEY/ instead.

General Caching Terminology & Behavior
--------------------------------------

 MODX uses different **partitions** for separate types of data being cached. A partition is, simplified, a folder in the core/cache/ folder, but the real value of partitions is that each partition can be assigned different cache handlers. **Cache handlers** are derivatives of the xPDOCache class and provide a unified API for storing, reading and removing cache entries.

 The default **cache handler,** xPDOFileCache, writes the cache to the file system in the core/cache/ folder, but other cache handlers are available in the core for APC (xPDOAPCCache), memcache(d) (xPDOMemCache, xPDOMemCached) and WinCache (xPDOWinCache).

MODX Core Cache Partitions
--------------------------

 There are a number of partitions in the core. These can easily be identified by looking in the core/cache/ folder with the default cache configuration.

 Typically you do not want work with the cached data directly (use the available APIs instead), but for means of understanding the MODX core we go through the core partitions here and briefly describe their purpose and contents.

 As we’ll discuss later, it is also possible for custom providers to be used in custom development work.

- **action\_map** Contains a big array of all the actions (IDs referencing controllers and namespaces) that can be accessed in the manager. As actions are deprecated and no longer used in 2.3, never rely on this.
- **auto\_publish** Contains a unix timestamp with the next time a resource needs to be automatically published or unpublished. (See modCacheManager.autoPublish())
- **context\_settings** For each context in the website, this contains a resource map (parent and child IDs), alias map, plugins used in the context and access policies.
- **db** The db cache partition is used when the cache\_db system or context setting is enabled and contains raw result sets for xPDO getObject/getCollection requests. More about this below.
- **includes** This is not an actual cache partition, but contains PHP files where snippets and plugins are wrapped in function calls for easy execution by the core. See scripts for the cache partition for snippets and plugins.
- **logs** Again, not an actual cache partition, but contains an error.log file and at times other log files (e.g. setup).
- **menu** Contains, per manager language, a multi dimensional array of the manager top menu.
- **mgr** Not an actual cache partition but is used by Smarty and the Google Minify in 2.2 to write cache files to.
- **registry** Default location for the modRegistry to write file-based register logs to. Not an actual cache partition.
- **resource** Contains, organised per context and resource ID, the partial-page caching mechanism for resources. These cache files contain the meta data for the resource, a cached representation of the resource (\_content) with uncached tags left intact, access policies for the resource and elements and their sources used in processing the resource.
- **rss** Not an actual cache partition, but used by MagpieRSS (powering the RSS dashboard widgets) to write its cache to.
- **scripts** Contains the source for snippets and plugins, which are later written to the includes cache folder for inclusion.
- **setup** Not an actual cache partition. Used by the MODX setup to cache smarty templates.
- **system\_settings** Contains the global MODX configuration and system settings. This partition is loaded first by requests to MODX. As alternative cache handlers for partitions are stored in the system settings, this partition can not be loaded from another cache handler that way.

 To change the cache handler for a specific cache partition, simply create a new system (or context) setting with the name of cache\_PARTITION\_handler (for example cache\_resource\_handler or cache\_scripts\_handler) and give it the value of the cache handler you would like to use. The default is xPDOFileCache but others are available for APC, memcache(d) and wincache.

 Note that in MODX 2.0.x the cache system was quite different. The available partitions were different and the system settings were stored in core/cache/config.cache.php. If you are still running MODX 2.0.x now, you should spend more time upgrading and less time reading this document.

### Database caching

 If you enable the **cache\_db** system setting, MODX can automatically cache database result sets fetched by any xPDOCriteria or xPDOQuery instance. This includes all of the result sets representing xPDOObjects or collections of xPDOObjects returned by methods like getObject and getCollection.

 This feature can be enabled in environments where database access is more expensive than PHP include time, for instance, when using an external database server, or custom configured for environments with memcached, APC, or other caching systems available. This is a separate partition from the other cache partitions in MODX, so it can be configured with other cache handlers. See [xPDO Caching](display/xPDO20/Caching) for additional information.

Refreshing the MODX Core Cache
------------------------------

 To refresh any of the core MODX cache partitions, use the `modCacheManager->refresh()` method. The minimum call has no parameters and will refresh all core cache partitions.

 ```
<pre class="brush: php">$modx->cacheManager->refresh();

``` Alternatively, you can define a `$providers` array with partition `key => $partitionOptions` elements.

 ```
<pre class="brush: php">// refresh the web and web2 context_settings only
$modx->cacheManager->refresh(array(
  'context_settings' => array('contexts' => array('web', 'web2')
));

``` The second parameter, `$results`, is passed by reference and will contain the results of each of the cache partitions. Depending on the partition, this can be a boolean or an array with more information from the result of refreshing the specific partition. The function itself returns a boolean indicating if any of the partitions returned a boolean false.

Programmatic (Custom) Caching
-----------------------------

 By interacting with the modCacheManager, you can easily cache any type of data. There are several useful features for you to use in maintaining a valid cache. By using the modCacheManager with a custom partition (though not required), users of your code can change the cache handler and store the data in a memcached, APC or WinCache instance instead of the default file based cache.

 The modCacheManager (xPDOCacheManager derivative) provides the following useful methods:

- `add($key, $var, $lifetime = 0, $options = array())`. Used for adding a value to the cache, but only if it does not yet exist or has expired.
- `replace ($key, $var, $lifetime = 0, $options = array())`. Used for replacing an existing cached value with a different one.
- `set ($key, $var, $lifetime = 0, $options = array())`. Used for setting a value in the cache no matter if it exists already (gets overwritten) or not (gets added).
- `delete ($key, $options = array())`. Deletes a cached value from the cache.
- `get ($key, $options = array())`. Gets a cached value from the cache.
- `clean ($options = array())`. Flushes (empties) an entire cache provider. Make sure to define the xPDO::OPT\_CACHE\_KEY in the options array.

 In general you can use `get($key)` and `set($key, $value)` to retrieve and set values respectively, but the additional methods provide additional control over the way data is manipulated.

 The `$options` array can contain the following options indicating the cache partition to write to, the cache handler to use and the default expiry time.

- `xPDO::OPT_CACHE_KEY`: the cache partition to write to.
- `xPDO::OPT_CACHE_HANDLER`: the cache handler to use. Typically you shouldn’t hardcode this and instead let the specific implementation handle the cache handler via system settings (ie cache\_PARTITION\_handler system setting).
- `xPDO::OPT_CACHE_EXPIRES:` the default expiry time.

### Example 1: Simple Setting & Getting

 ```
<pre class="brush: php">$str = 'My test cached data.';
// Writes the data to the default cache partition with an expiry time of 2 hours.
$modx->cacheManager->set('testdata', $str, 7200);
// Gets the data from cache again. Returns null if cache is not available or expired.
$str = $modx->cacheManager->get('testdata');

```### Example 2: Setting & Getting to a custom partition

 ```
<pre class="brush: php">$str = 'My test cached data.';
$options = array(
  xPDO::OPT_CACHE_KEY => 'mypartition',
);
// Writes the data to the default cache partition with an expiry time of 2 hours.
$modx->cacheManager->set('testdata', $str, 7200, $options);
// Gets the data from cache again. Returns null if cache is not available or expired.
$str = $modx->cacheManager->get('testdata', $options);

```Note on Revolution 2.0
----------------------

 MODX Revolution 2.0 had a different caching system with different partitions. To clear the cache in 2.0, you would use the clearCache() method that has been deprecated since 2.1. It's better to upgrade to the latest version than to continue using 2.0.

 ```
<pre class="brush: php">// clear all the usual stuff by default (all files with the extension .cache.php
// in the cachePath + all object caches)
$modx->cacheManager->clearCache();
// clear only cache files with extension .php or .log in the web/ custom/
// or logs/ paths; no objects are cleared
$paths = array('web/', 'custom/', 'logs/');
$options = array('objects' => null, 'extensions' => array('.php', '.log'));
$modx->cacheManager->clearCache($paths, $options);
// clear all cache files with extension .php in the cachePath
// + all objects + execute the timed publishing checks
$paths = array('');
$options = array('objects' => '*', 'publishing' => true, 'extensions' => array('.php'));
$modx->cacheManager->clearCache($paths, $options);

```
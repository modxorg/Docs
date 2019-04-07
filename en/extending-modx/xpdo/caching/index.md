---
title: "Caching"
_old_id: "1152"
_old_uri: "2.x/advanced-features/caching"
---

## Global Configuration

To use xPDO's caching abilities, you'll need to configure several global options to define caching options. Most importantly, you should define the xPDO::OPT\_CACHE\_PATH into the $options variable of the [xPDO constructor](extending-modx/xpdo/create-xpdo-instance "The xPDO Constructor"). Set it to the absolute path you would like xPDO to write cache files to. This also provides a location for xPDO to write log files if configured to do so, which would require this file path to be defined even if no file-based caching was being utilized.

There are several additional global options that can be set if you wish to use something other than the default cache partition and provider.

- **xPDO::OPT\_CACHE\_HANDLER** - This defines a cache provider, or xPDOCache derivative class which implements xPDO caching methods. (default=cache.xPDOFileCache)
- **xPDO::OPT\_CACHE\_KEY** - This defines a cache partition, or an instance of the xPDOCache derivative class defined as the cache handler or _provider_. (default=default)
- **xPDO::OPT\_CACHE\_EXPIRES** - This defines a default cache expiration time in seconds for all cache partitions to use if not specifically configured themselves.(default=0)

Additional options are defined for specific cache providers.

## Caching Providers and Partitions

xPDO supports extending the caching mechanism to different 'caching providers'. The default provider, xPDOFileCache, is a file-based caching implementation.

The base class, xPDOCache, can be extended to create different cache providers, and users can configure xPDO via the xPDO::OPT\_CACHE\_HANDLER option to use a specific derived class.

A derived xPDOCache implementation must be in a package that is loaded by the constructor. You can use xPDO::OPT\_BASE\_PACKAGES to define such packages to preload or load it in your overridden constructor when extending the xPDO class.

## Manipulation of the Cache

The $xpdo->cacheManager object, built from the [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager") class, is accessible after calling $xpdo->getCacheManager().

A simple example script of setting data into a cache partition, then getting it, and deleting it, is as follows:

``` php
$str = 'My cached data.';
$xpdo->cacheManager->set('testdata', $str);

echo $xpdo->cacheManager->get('testdata');
// outputs: My cached data.

$xpdo->cacheManager->delete('testdata');
```

This uses the global cache configuration to set, retrieve, and remove a cache entry. This would be the default cache partition used by the xPDOCacheManager.

## Utilizing Specific Cache Partitions

To target cache data in a specific partition, you will need to either pass a configuration defining the partition to each method call from xPDOCacheManager, or retrieve a specific cache provider partition and utilize it's methods directly.

An example of passing the configuration to the xPDOCacheManager methods:

``` php
$cacheOptions = array(
    xPDO::OPT_CACHE_KEY => 'myCache',
    xPDO::OPT_CACHE_HANDLER => 'cache.xPDOAPCCache',
);

$xpdo->cacheManager->set('testdata', 'My cached data.', 0, $cacheOptions);

echo $xpdo->cacheManager->get('testdata', $cacheOptions);
// outputs: My cached data.

$xpdo->cacheManager->delete('testdata', $cacheOptions);
```

This would use an instance of xPDOAPCCache and prefix all entries with cacheMe since APC does not allow multiple instances and in order to use it the entries must be partitioned per xPDOCache instance by their key.

An alternative approach is to get the specific cache partition itself and use it's methods directly:

``` php
$myCache = $xpdo->cacheManager->getCacheProvider('myCache', array(
    xPDO::OPT_CACHE_KEY => 'myCache',
    xPDO::OPT_CACHE_HANDLER => 'cache.xPDOAPCCache',
));

$myCache->set('testdata', 'My cached data.');

echo $myCache->get('testdata');
// outputs: My cached data.

$myCache->delete('testdata');
```

## See Also

- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")

1. [Caching Tutorial - Basic Snippets](extending-modx/caching/example)
2. [Caching Tutorial - Lifetimes](extending-modx/caching/lifetimes)
---
title: "Caching"
_old_id: "1502"
_old_uri: "1.x/advanced-features/caching"
---

Setup
-----

To use xPDO's caching abilities, you'll first need to pass the XPDO\_OPT\_CACHE\_PATH into the $options variable of the [xPDO constructor](/xpdo/1.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "The xPDO Constructor"). You can set it to the absolute path you would like xPDO to write your cache files to.

Caching Providers
-----------------

xPDO supports extending the caching mechanism to different 'caching providers'. The default provider, xPDOFileCache, is file-based caching.

The base class, xPDOCache, can be extended to provide different caching solutions, and then one can pass in the cache file location into XPDO\_OPT\_CACHE\_HANDLER to properly load the right extension.

<div class="note">xPDO also supports memcache, by passing in the XPDO\_OPT\_CACHE\_HANDLER parameter to the xPDO constructor as 'cache.xpdomemcache'. This will only work if the system has memcache installed.</div>The $xpdo->cacheManager object, built from the [xPDOCacheManager](/xpdo/1.x/class-reference/xpdocachemanager "xPDOCacheManager") class, is accessible after calling $xpdo->getCacheManager().

Manipulation of the Cache
-------------------------

A simple example script of setting data, then getting it, and deleting it, is as follows:

```
<pre class="brush: php">
$str = 'My cached data.';
$xpdo->cacheManager->set('testdata',$str);

echo $xpdo->cacheManager->get('testdata');
// outputs: My cached data.

$xpdo->cacheManager->delete('testdata');

```See Also
--------

- [xPDOCacheManager](/xpdo/1.x/class-reference/xpdocachemanager "xPDOCacheManager")
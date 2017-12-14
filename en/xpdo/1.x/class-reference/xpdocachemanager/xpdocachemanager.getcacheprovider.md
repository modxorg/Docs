---
title: "xPDOCacheManager.getCacheProvider"
_old_id: "1609"
_old_uri: "1.x/class-reference/xpdocachemanager/xpdocachemanager.getcacheprovider"
---

xPDOCacheManager::getCacheProvider
----------------------------------

Get an instance of a provider which implements the xPDOCache interface. Defaults to xPDOFileCache.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#getCacheProvider>

```
<pre class="brush: php">
void &getCacheProvider ([ $key = ''], [ $options = array()])

```Example
-------

```
<pre class="brush: php">
$cacheManager = $xpdo->getCacheManager();
$provider = $cacheManager->getCacheProvider('xPDOMemCache');

```See Also
--------

- [xPDOCacheManager](/xpdo/1.x/class-reference/xpdocachemanager "xPDOCacheManager")
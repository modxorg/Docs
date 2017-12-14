---
title: "xPDOCacheManager.get"
_old_id: "1607"
_old_uri: "1.x/class-reference/xpdocachemanager/xpdocachemanager.get"
---

xPDOCacheManager::get
---------------------

Get a value from a cache provider by key.

Also allows for an array of options to be passed. The current available values are:

- **format** - If equals XPDO\_CACHE\_JSON, will simply get the contents of the array. This is useful if you set() the cache with XPDO\_CACHE\_JSON, to better handle JSON data.
- **removeIfEmpty** - If set to true, will remove the cache file if it's empty. This is the default action.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#get>

```
<pre class="brush: php">
mixed get (string $key, [array $options = array()])

```Example
-------

Get the cache record 'test' into a string:

```
<pre class="brush: php">
$test = $xpdo->cacheManager->get('test');

```Get our JSON cache data called 'myjson':

```
<pre class="brush: php">
$myJsonData = $xpdo->cacheManager->get('myjson',array('format' => XPDO_CACHE_JSON));

```See Also
--------

1. [xPDOCacheManager.copyFile](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.copyfile)
2. [xPDOCacheManager.copyTree](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.copytree)
3. [xPDOCacheManager.delete](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.delete)
4. [xPDOCacheManager.deleteTree](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.deletetree)
5. [xPDOCacheManager.endsWith](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.endswith)
6. [xPDOCacheManager.escapeSingleQuotes](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.escapesinglequotes)
7. [xPDOCacheManager.get](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.get)
8. [xPDOCacheManager.getCachePath](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.getcachepath)
9. [xPDOCacheManager.getCacheProvider](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.getcacheprovider)
10. [xPDOCacheManager.matches](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.matches)
11. [xPDOCacheManager.replace](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.replace)
12. [xPDOCacheManager.writeFile](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.writefile)
13. [xPDOCacheManager.set](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.set)
14. [xPDOCacheManager.writeTree](/xpdo/1.x/class-reference/xpdocachemanager/xpdocachemanager.writetree)

- [xPDOCacheManager](/xpdo/1.x/class-reference/xpdocachemanager "xPDOCacheManager")
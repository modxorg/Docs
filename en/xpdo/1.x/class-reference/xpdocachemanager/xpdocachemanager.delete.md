---
title: "xPDOCacheManager.delete"
_old_id: "1603"
_old_uri: "1.x/class-reference/xpdocachemanager/xpdocachemanager.delete"
---

xPDOCacheManager::delete
------------------------

Delete a key-value pair from a cache provider. Also allows for extra options:

- **cache\_ext** - Defaults to '.cache.php'. Useful if you're wanting to delete non-cache files from the cache/ directory.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#delete>

```
<pre class="brush: php">
boolean delete (string $key, [array $options = array()])

```Example
-------

Remove the 'mystuff' entry.

```
<pre class="brush: php">
$xpdo->cacheManager->remove('mystuff');

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
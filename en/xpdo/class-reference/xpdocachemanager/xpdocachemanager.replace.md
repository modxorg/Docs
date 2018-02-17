---
title: "xPDOCacheManager.replace"
_old_id: "1270"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.replace"
---

## xPDOCacheManager::replace

Replace a key-value pair in in a cache provider.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#replace>

```
<pre class="brush: php">
boolean replace (string $key, mixed &$var, [integer $lifetime = 0], [array $options = array()])

```## Example

Replace a key with a new value, to expire in 2 hours:

```
<pre class="brush: php">
$str = 'A new value for the cache.';
$xpdo->cacheManager->replace('mystuff',$str,7200);

```## See Also

1. [xPDOCacheManager.copyFile](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.copyfile)
2. [xPDOCacheManager.copyTree](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.copytree)
3. [xPDOCacheManager.delete](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.delete)
4. [xPDOCacheManager.deleteTree](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.deletetree)
5. [xPDOCacheManager.endsWith](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.endswith)
6. [xPDOCacheManager.escapeSingleQuotes](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.escapesinglequotes)
7. [xPDOCacheManager.get](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.get)
8. [xPDOCacheManager.getCachePath](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.getcachepath)
9. [xPDOCacheManager.getCacheProvider](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.getcacheprovider)
10. [xPDOCacheManager.matches](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.matches)
11. [xPDOCacheManager.replace](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.replace)
12. [xPDOCacheManager.writeFile](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.writefile)
13. [xPDOCacheManager.set](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.set)
14. [xPDOCacheManager.writeTree](/xpdo/2.x/class-reference/xpdocachemanager/xpdocachemanager.writetree)

- [xPDOCacheManager](/xpdo/2.x/class-reference/xpdocachemanager "xPDOCacheManager")
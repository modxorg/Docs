---
title: "xPDOCacheManager.set"
_old_id: "1271"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.set"
---

## xPDOCacheManager::set

Set a key-value pair in a cache provider.

Also allows for an array of options to be passed. The current available values are:

- **format** - If equals XPDO\_CACHE\_JSON, will set the string as the only data in file (rather than a return of the string. This is useful if you want more proper parsing of JSON data.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#set>

``` php 
boolean set (string $key, mixed &$var, [integer $lifetime = 0], [array $options = array()])
```

## Example

Set a cache file to the string provided, to expire in 2 hours.

``` php 
$str = 'This will be cached.';
$xpdo->cacheManager->set('mycachefile',$str,7200);
```

## See Also

1. [xPDOCacheManager.copyFile](xpdo/class-reference/xpdocachemanager/xpdocachemanager.copyfile)
2. [xPDOCacheManager.copyTree](xpdo/class-reference/xpdocachemanager/xpdocachemanager.copytree)
3. [xPDOCacheManager.delete](xpdo/class-reference/xpdocachemanager/xpdocachemanager.delete)
4. [xPDOCacheManager.deleteTree](xpdo/class-reference/xpdocachemanager/xpdocachemanager.deletetree)
5. [xPDOCacheManager.endsWith](xpdo/class-reference/xpdocachemanager/xpdocachemanager.endswith)
6. [xPDOCacheManager.escapeSingleQuotes](xpdo/class-reference/xpdocachemanager/xpdocachemanager.escapesinglequotes)
7. [xPDOCacheManager.get](xpdo/class-reference/xpdocachemanager/xpdocachemanager.get)
8. [xPDOCacheManager.getCachePath](xpdo/class-reference/xpdocachemanager/xpdocachemanager.getcachepath)
9. [xPDOCacheManager.getCacheProvider](xpdo/class-reference/xpdocachemanager/xpdocachemanager.getcacheprovider)
10. [xPDOCacheManager.matches](xpdo/class-reference/xpdocachemanager/xpdocachemanager.matches)
11. [xPDOCacheManager.replace](xpdo/class-reference/xpdocachemanager/xpdocachemanager.replace)
12. [xPDOCacheManager.writeFile](xpdo/class-reference/xpdocachemanager/xpdocachemanager.writefile)
13. [xPDOCacheManager.set](xpdo/class-reference/xpdocachemanager/xpdocachemanager.set)
14. [xPDOCacheManager.writeTree](xpdo/class-reference/xpdocachemanager/xpdocachemanager.writetree)

- [xPDOCacheManager](xpdo/class-reference/xpdocachemanager "xPDOCacheManager")
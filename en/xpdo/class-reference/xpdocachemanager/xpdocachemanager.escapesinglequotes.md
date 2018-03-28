---
title: "xPDOCacheManager.escapeSingleQuotes"
_old_id: "1265"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.escapesinglequotes"
---

## xPDOCacheManager::escapeSingleQuotes

Escapes all single quotes in a string.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#escapeSingleQuotes>

``` php 
string escapeSingleQuotes (string $s)
```

## Example

Escape the quotes in the string below:

``` php 
$str = 'Testing my "fun" Windows system.';
echo $xpdo->cacheManager->escapeSingleQuotes($str);
// outputs: Testing my \"fun\" Windows system.
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
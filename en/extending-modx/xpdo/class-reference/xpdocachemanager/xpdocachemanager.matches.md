---
title: "xPDOCacheManager.matches"
_old_id: "1269"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.matches"
---

## xPDOCacheManager::matches

## Syntax

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#matches>

``` php 
boolean matches (string $string, string|array $pattern)
```

## Example

See if the string has the words 'php' in it:

``` php 
if ($xpdo->cacheManager->matches('This string loves PHP!','/php/i')) {
  echo 'Yay!';
}
// Outputs: 'Yay!'
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
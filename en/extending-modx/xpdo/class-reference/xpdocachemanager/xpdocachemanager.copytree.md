---
title: "xPDOCacheManager.copyTree"
_old_id: "1261"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.copytree"
---

## xPDOCacheManager::copyTree

Recursively copies a directory tree from a source directory to a target directory. Allows the following options:

- `new_dir_permissions` - The permissions to set any new directories to that were created in the target. (Can also be the 4th parameter of copyFile.) Defaults to 0775.
- `new_file_permissions` - The permissions to set the new file to if `copy_preserve_permissions` is false. Defaults to 0664.
- `copy_exclude_items` - An array of names of files to skip.
- `copy_exclude_patterns` - An array or string of patterns to exclude by.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#copyTree>

``` php
array|boolean copyTree (string $source, string $target, [array $options = array()])
```

## Example

Copy a directory:

``` php
$xpdo->cacheManager->copyTree('/my/old/dir/','/my/new/dir/');
```

## See Also

1. [xPDOCacheManager.copyFile](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.copyfile)
2. [xPDOCacheManager.copyTree](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.copytree)
3. [xPDOCacheManager.delete](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.delete)
4. [xPDOCacheManager.deleteTree](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.deletetree)
5. [xPDOCacheManager.endsWith](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.endswith)
6. [xPDOCacheManager.escapeSingleQuotes](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.escapesinglequotes)
7. [xPDOCacheManager.get](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.get)
8. [xPDOCacheManager.getCachePath](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getcachepath)
9. [xPDOCacheManager.getCacheProvider](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getcacheprovider)
10. [xPDOCacheManager.matches](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.matches)
11. [xPDOCacheManager.replace](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.replace)
12. [xPDOCacheManager.writeFile](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.writefile)
13. [xPDOCacheManager.set](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.set)
14. [xPDOCacheManager.writeTree](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.writetree)
15. [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")

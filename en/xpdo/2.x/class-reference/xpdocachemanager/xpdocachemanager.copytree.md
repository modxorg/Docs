---
title: "xPDOCacheManager.copyTree"
_old_id: "1261"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.copytree"
---

xPDOCacheManager::copyTree
--------------------------

Recursively copies a directory tree from a source directory to a target directory. Allows the following options:

- **new\_dir\_permissions** - The permissions to set any new directories to that were created in the target. (Can also be the 4th parameter of copyFile.) Defaults to 0775.
- **new\_file\_permissions** - The permissions to set the new file to if copy\_preserve\_permissions is false. Defaults to 0664.
- **copy\_exclude\_items** - An array of names of files to skip.
- **copy\_exclude\_patterns** - An array or string of patterns to exclude by.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#copyTree>

```
<pre class="brush: php">
array|boolean copyTree (string $source, string $target, [array $options = array()])

```Example
-------

Copy a directory:

```
<pre class="brush: php">
$xpdo->cacheManager->copyTree('/my/old/dir/','/my/new/dir/');

```See Also
--------

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
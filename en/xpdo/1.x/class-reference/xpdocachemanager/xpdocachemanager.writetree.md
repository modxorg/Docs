---
title: "xPDOCacheManager.writeTree"
_old_id: "1614"
_old_uri: "1.x/class-reference/xpdocachemanager/xpdocachemanager.writetree"
---

xPDOCacheManager::writeTree
---------------------------

Recursively writes a directory tree of files to the filesystem.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#writeTree>

```
<pre class="brush: php">
boolean writeTree (string $dirname, [array $options = array()])

```Example
-------

Create a new directory on the FS.

```
<pre class="brush: php">
$xpdo->cacheManager->writeTree('/path/to/new/directory/');

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
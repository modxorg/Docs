---
title: "xPDOCacheManager.copyFile"
_old_id: "1260"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.copyfile"
---

## xPDOCacheManager::copyFile

Copies a file from a source file to a target directory. Takes the following options as an optional 3rd parameter:

- **copy\_newer\_only** - If the source file is older than the target, it will not copy the file.
- **copy\_preserve\_permissions** - xPDO will attempt to copy over the permission structure from the source file to the target. Defaults to false.
- **copy\_preserve\_filemtime** - xPDO will attempt to copy over the modified time from the source file to the target file. Defaults to true.
- **copy\_return\_file\_stat** - Setting to true will return the php [stat()](http://www.php.net/stat) information in the return array. Defaults to false.
- **new\_dir\_permissions** - The permissions to set any new directories to that were created in the target. (Can also be the 4th parameter of copyFile.) Defaults to 0775.
- **new\_file\_permissions** - The permissions to set the new file to if copy\_preserve\_permissions is false. Defaults to 0664.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#copyFile>

```
<pre class="brush: php">
boolean|array copyFile (string $source, string $target, [array $options = array()])

```## Example

Copy a file:

```
<pre class="brush: php">
$xpdo->cacheManager->copyFile('/my/path/to/file.txt','/my/new/path/dir/');

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
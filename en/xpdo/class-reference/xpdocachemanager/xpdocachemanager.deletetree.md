---
title: "xPDOCacheManager.deleteTree"
_old_id: "1263"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.deletetree"
---

## xPDOCacheManager::deleteTree

Recursively deletes a directory tree of files.

The options array has the following parameters available:

- **deleteTop** - If true, will delete the top directory that is specified. Defaults to false.
- **skipDirs** - If true, will not delete the directories; just the files. Defaults to false.
- **extensions** - An array of file extensions to filter by - will only delete files with those extensions. Set to null or false to delete all files.
- **delete\_exclude\_items** - An array of names of files to skip.
- **delete\_exclude\_patterns** - An array or string of patterns to exclude by.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#deleteTree>

```
<pre class="brush: php">
boolean deleteTree (string $dirname, [array $options = array(
   'deleteTop' => false,
   'skipDirs' => false,
   'extensions' => array('.cache.php')
)])

```## Example

Delete the /modx/assets/videos/ directory (assuming the constant MODX\_ASSETS\_PATH is set) and all the files in it:

```
<pre class="brush: php">
$xpdo->cacheManager->deleteTree(MODX_ASSETS_PATH.'videos/',array(
   'deleteTop' => true,
   'extensions' => false,
));

```Delete only .flv files in the above directory:

```
<pre class="brush: php">
$xpdo->cacheManager->deleteTree(MODX_ASSETS_PATH.'videos/',array(
   'deleteTop' => true,
   'extensions' => array('.flv'),
));

```Delete all movies in above directory, except george.mov, buddies.flv, and any file name containing the word 'fun'.

```
<pre class="brush: php">
$xpdo->cacheManager->deleteTree(MODX_ASSETS_PATH.'videos/',array(
   'deleteTop' => true,
   'extensions' => false,
   'delete_exclude_items' => array('george.mov','buddies.flv'),
   'delete_exclude_patterns' => '/fun/i',
));

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
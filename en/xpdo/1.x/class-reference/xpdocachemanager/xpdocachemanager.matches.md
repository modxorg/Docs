---
title: "xPDOCacheManager.matches"
_old_id: "1610"
_old_uri: "1.x/class-reference/xpdocachemanager/xpdocachemanager.matches"
---

xPDOCacheManager::matches
-------------------------

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#matches>

```
<pre class="brush: php">
boolean matches (string $string, string|array $pattern)

```Example
-------

See if the string has the words 'php' in it:

```
<pre class="brush: php">
if ($xpdo->cacheManager->matches('This string loves PHP!','/php/i')) {
  echo 'Yay!';
}
// Outputs: 'Yay!'

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
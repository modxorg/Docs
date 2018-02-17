---
title: "modX.getCacheManager"
_old_id: "1060"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getcachemanager"
---

## modX::getCacheManager

Get an extended xPDOCacheManager instance responsible for MODx caching.

Overrides xPDO::getCacheManager.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getCacheManager()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getCacheManager())

```
<pre class="brush: php">
object getCacheManager()

```## Example

Get the Cache Manager to set a dummy cache file.

```
<pre class="brush: php">
$cacheManager = $modx->getCacheManager();
$cacheManager->set('testcachefile','test123');

```## See Also

- [Caching](/xpdo/2.x/advanced-features/caching "Caching") – the full options are documented on the xPDO caching page.
- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
---
title: "modResource.getProcessed"
description: "Check whether the Resource output has already been built"
---

## modResource.getProcessed

Reports the state of the `_processed` flag. `process()` and `parseContent()` set it once they have parsed the content.

`modRequest` also sets it to `true` on a Resource restored from the site cache. That keeps `process()` from parsing the cached `_content` again. `modCacheManager::generateResource()` reads the same flag before it writes a Resource to cache.

## Syntax

``` php
boolean getProcessed ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
if (!$resource->getProcessed()) {
    $resource->prepare();
}
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.setProcessed](extending-modx/core-model/modresource/modresource.setprocessed)
- [modResource.process](extending-modx/core-model/modresource/modresource.process)

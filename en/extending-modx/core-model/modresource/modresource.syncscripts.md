---
title: "modResource.syncScripts"
description: "Copy the script registries collected during processing to the Resource"
---

## modResource::syncScripts

Copies `jscripts`, `sjscripts` and `loadedjscripts` from the MODX instance into the matching `_jscripts`, `_sjscripts` and `_loadedjscripts` properties of the Resource. Scripts registered by cacheable elements would otherwise be lost once the Resource is written to the site cache.

Called from `prepare()` between `process()` and `parseContent()`. `modRequest` merges these properties back into the MODX instance when it restores a Resource from the cache.

## Syntax

``` php
void syncScripts ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->prepare();
print_r($resource->_jscripts);
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.prepare](extending-modx/core-model/modresource/modresource.prepare)

---
title: "modResource.prepare"
description: "Run the whole output pipeline of a Resource"
---

## modResource::prepare

Runs the three stages that turn the stored Resource into the markup sent to the browser. `process()` builds the cacheable part, `syncScripts()` copies the script registries, and `parseContent()` evaluates everything that is left. The result lands in the public `_output` property.

`modResponse::outputContent()` calls it once per request for content types that are not binary.

## Syntax

``` php
void prepare ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->prepare();
echo $resource->_output;
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.process](extending-modx/core-model/modresource/modresource.process)
- [modResource.parseContent](extending-modx/core-model/modresource/modresource.parsecontent)
- [modResource.syncScripts](extending-modx/core-model/modresource/modresource.syncscripts)

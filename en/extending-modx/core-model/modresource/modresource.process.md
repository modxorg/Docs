---
title: "modResource.process"
description: "Build the cacheable part of a Resource output"
---

## modResource::process

Fills `_content` with the cacheable output. When the Resource has a Template, the Template is processed first and its output is used. Without one, tags in the raw content are parsed directly with the `parser_max_iterations` limit.

If the Resource is cacheable, already processed and `_content` is not empty, nothing is reparsed and the existing `_content` is returned. That is the normal path for a Resource restored from the site cache.

## Syntax

``` php
string process ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$content = $resource->process();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.prepare](extending-modx/core-model/modresource/modresource.prepare)
- [modResource.getProcessed](extending-modx/core-model/modresource/modresource.getprocessed)

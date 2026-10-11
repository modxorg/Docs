---
title: "modX.beforeProcessing"
description: "Empty front-end hook called after the Resource is loaded"
---

## modX::beforeProcessing

An empty hook that `modRequest::prepareResponse()` calls right after the Resource is resolved and before `OnLoadWebDocument` fires — the last extension point before any output.

The body is empty in core, so behavior comes from overriding the method in a `modX` subclass. Only front-end requests reach it; manager and connector responses never call it.

## Syntax

``` php
void beforeProcessing ()
```

No parameters.

## Example

``` php
class SiteX extends \MODX\Revolution\modX
{
    public function beforeProcessing()
    {
        // runs after the Resource is loaded, before OnLoadWebDocument
    }
}
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.beforeRender](extending-modx/modx-class/reference/modx.beforerender)
- [OnLoadWebDocument](extending-modx/plugins/system-events/onloadwebdocument)

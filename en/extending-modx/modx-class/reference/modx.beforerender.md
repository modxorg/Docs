---
title: "modX.beforeRender"
description: "Empty front-end hook called right before the response is rendered"
---

## modX::beforeRender

An empty hook that `modResponse::outputContent()` calls immediately before `OnWebPagePrerender` fires, whether or not resource output was processed. Scripts are already injected into the page at that point.

The body is empty in core, so behavior comes from overriding the method in a `modX` subclass. Only front-end responses reach it: `modManagerResponse` and `modConnectorResponse` replace `outputContent()` without calling it.

## Syntax

``` php
void beforeRender ()
```

No parameters.

## Example

``` php
class SiteX extends \MODX\Revolution\modX
{
    public function beforeRender()
    {
        // runs right before OnWebPagePrerender
    }
}
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.beforeProcessing](extending-modx/modx-class/reference/modx.beforeprocessing)
- [OnWebPagePrerender](extending-modx/plugins/system-events/onwebpageprerender)

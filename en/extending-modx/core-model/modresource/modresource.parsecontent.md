---
title: "modResource.parseContent"
description: "Parse uncacheable tags and produce the Resource output"
---

## modResource::parseContent

Copies `_content` into `_output` and runs the parser over it twice. The first pass evaluates uncacheable tags; the second processes the rest and removes tags that remain unparsed.

While parsing, the Resource becomes the current `modx->resource` and `$data` is exported as placeholders; both are restored before the method returns. If the Resource has not been processed yet, the cacheable pass runs here as well.

## Syntax

``` php
string parseContent ([array $data = array()])
```

- `$data` _(array)_ values written to placeholders for the duration of the call, by default `array()`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$output = $resource->parseContent(array('message' => 'foobar'));
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.prepare](extending-modx/core-model/modresource/modresource.prepare)
- [modResource.process](extending-modx/core-model/modresource/modresource.process)

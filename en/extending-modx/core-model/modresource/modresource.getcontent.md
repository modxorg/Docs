---
title: "modResource.getContent"
description: "Get the raw source content of a Resource"
---

## modResource::getContent

Returns the content stored on the Resource, tags and all — nothing is parsed. The method is declared in `modResource` itself, not inherited: the class does not extend `modElement`.

`modStaticResource` overrides the method and reads the source from a file instead of the field.

## Syntax

``` php
string getContent ([array $options = array()])
```

- `$options` _(array)_ when it holds a `content` key, that value is returned instead of the stored one, by default `array()`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$content = $resource->getContent();
$preview = $resource->getContent(array('content' => 'foobar'));
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.setContent](extending-modx/core-model/modresource/modresource.setcontent)
- [modResource.process](extending-modx/core-model/modresource/modresource.process)

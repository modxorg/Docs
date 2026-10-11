---
title: "modResource.setContent"
description: "Set the raw source content of a Resource"
---

## modResource::setContent

Writes `$content` into the `content` field of the Resource. The method is declared in `modResource` itself rather than inherited from `modElement`.

`$options` is accepted for signature parity with the other element classes but is ignored by this implementation. The return value follows `set()`: `true` only when the stored content actually changed. Nothing is written to the database until `save()`.

## Syntax

``` php
boolean setContent ($content [, array $options = array()])
```

- `$content` _(mixed)_ value stored in the `content` field
- `$options` _(array)_ unused by this implementation, by default `array()`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setContent('foobar [[++site_name]]');
$resource->save();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getContent](extending-modx/core-model/modresource/modresource.getcontent)

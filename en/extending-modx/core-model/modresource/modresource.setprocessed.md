---
title: "modResource.setProcessed"
description: "Mark the Resource output as built"
---

## modResource.setProcessed

Writes the `_processed` flag directly, casting the value to boolean.

The only call in core is `modRequest` setting it to `true` after it restores a Resource from the site cache. That keeps `process()` on the cached `_content` instead of a fresh parse.

## Syntax

``` php
void setProcessed ($processed)
```

- `$processed` _(boolean)_ value stored in the flag

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->_content = 'foobar';
$resource->setProcessed(true);
$resource->process();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getProcessed](extending-modx/core-model/modresource/modresource.getprocessed)

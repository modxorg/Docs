---
title: "modResource.hasChildren"
description: "Count the direct children of a Resource"
---

## modResource.hasChildren

Counts the Resources whose `parent` is this Resource. Despite the name, the return value is the number of children, not a boolean.

The query is separate from the `Children` relation, so it always reflects the current database state.

## Syntax

``` php
integer hasChildren ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
if ($resource->hasChildren() > 0) {
    echo 'container';
}
```

## See Also

- [modResource](extending-modx/core-model/modresource)

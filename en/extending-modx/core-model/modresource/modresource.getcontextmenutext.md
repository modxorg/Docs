---
title: "modResource.getContextMenuText"
description: "Get the context menu labels of a Resource class"
---

## modResource.getContextMenuText

Returns the two labels the manager context menu shows for this Resource class: `text_create` and `text_create_here`. The base implementation resolves the generic `resource` lexicon entries, `modDocument` overrides it with the `document` ones.

The `ConfigJs` processor calls the method for every descendant class with `showInContextMenu` set. In a derivative class it is meant to be overridden rather than called directly.

## Syntax

``` php
array getContextMenuText ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$labels = $resource->getContextMenuText();
echo $labels['text_create'];
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getResourceTypeName](extending-modx/core-model/modresource/modresource.getresourcetypename)

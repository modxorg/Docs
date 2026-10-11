---
title: "modResource.getIconClasses"
description: "Build the CSS icon classes of a Resource for the manager tree"
---

## modResource.getIconClasses

Assembles the CSS classes the manager tree uses as the Resource icon. The content type icon and the template icon are added when they exist; `mgr_tree_icon_<classkey>` is used only when neither is set. Weblinks, symlinks and static resources add their own icon on top.

Two CSS classes scoped to the Resource and its parent are always appended: `icon-<context>-<id>` and `icon-parent-<context>-<parent>`. A folder modifier is added when the Resource has children or `isfolder` is set. It applies only when no template icon was found and the default `tree-resource` icon is still in use.

## Syntax

``` php
array getIconClasses ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
echo implode(' ', $resource->getIconClasses());
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.prepareTreeNode](extending-modx/core-model/modresource/modresource.preparetreenode)

---
title: "modResource.prepareTreeNode"
description: "Extension point for the manager resource tree node"
---

## modResource.prepareTreeNode

Receives the array describing one node of the manager tree right before it is sent to the browser, and returns it unchanged. The `Resource/GetNodes` processor calls the method as the last step of node preparation.

Override it in a derivative Resource class to change the node — its text, tooltip or CSS classes — for that class only.

## Syntax

``` php
array prepareTreeNode ([array $node = array()])
```

- `$node` _(array)_ node data as assembled by the tree processor, by default `array()`

## Example

``` php
class MyResource extends modResource
{
    public function prepareTreeNode(array $node = [])
    {
        $node['qtip'] = 'foobar';
        return $node;
    }
}
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getIconClasses](extending-modx/core-model/modresource/modresource.geticonclasses)

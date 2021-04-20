---
title: "modX.getTree"
description: "Get a site tree from a single or multiple modResource instances"
---

## modX::getTree

Get a site tree from a single or multiple modResource instances.

## Syntax

API Doc: [modX::getTree()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getTree())

``` php
array getTree ([int|array $id = null], [int $depth = 10], [array $options = array()])
```

- `$id` _(int|array)_ A single or multiple modResource ids to build the tree from.
- `$depth` _(integer)_ The maximum depth to build the tree (default 10).
- `$options` _(array)_ An array of filtering options, such as 'context' to specify the context to grab from.

## Example

Get a tree for the Resource with ID 12. Only go 5 levels deep.

``` php
$treeArray = $modx->getTree(12,5);
```

## See Also

- [modX](extending-modx/core-model/modx "modX")

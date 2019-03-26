---
title: "modX.getTree"
_old_id: "1077"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.gettree"
---

## modX::getTree

Get a site tree from a single or multiple modResource instances.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getTree()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getTree())

``` php 
array getTree ([int|array $id = null], [int $depth = 10])
```

## Example

Get a tree for the Resource with ID 12. Only go 5 levels deep.

``` php 
$treeArray = $modx->getTree(12,5);
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
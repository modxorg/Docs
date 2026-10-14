---
title: "modX.setPlaceholders"
description: "Sets a collection of placeholders from an array or object."
_old_id: "1107"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.setplaceholders"
---

## modX::setPlaceholders

Sets a collection of placeholders from an array or object. An optional `$namespace` is prepended to each key in the collection to keep it apart from other placeholders.

## Syntax

``` php
void setPlaceholders (array|object  $placeholders, [string $namespace = ''])
```

No separator is inserted — neither between the namespace and the key nor between the levels of a nested array. `setPlaceholders(['a' => ['b' => 1]])` with an empty namespace therefore sets a single placeholder called `ab`.

Nested arrays are concatenated the same way: `getChunk` and `toPlaceholders` insert a dot between levels, `setPlaceholders` does not. For multi-dimensional arrays and objects with non-scalar values, use [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders"), which delimits each level with a separator (a dot by default).


## Example

Add an array of placeholders, and prefix `my.` to their keys.

``` php
$modx->setPlaceholders(array(
   'name' => 'John',
   'email' => 'jdoe@gmail.com',
),'my.');
```

## See Also

- [modX.toPlaceholder](extending-modx/modx-class/reference/modx.toplaceholder "modX.toPlaceholder")
- [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders")
- [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder")
- [modX.getPlaceholder](extending-modx/modx-class/reference/modx.getplaceholder "modX.getPlaceholder")

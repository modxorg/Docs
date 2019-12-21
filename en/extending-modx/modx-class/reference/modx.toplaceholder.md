---
title: "modX.toPlaceholder"
_old_id: "1109"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholder"
---

## modX::toPlaceholder

Recursively validates and sets placeholders appropriate to the value type passed.

## Syntax

API Doc: [modX::toPlaceholder()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::toPlaceholder())

``` php
array toPlaceholder (string $key, mixed $value, [string $prefix = ''], [string $separator = '.'], [boolean $restore = false])
```

## Example

Set a placeholder and prefix its key with 'my.' Returns an array multi-dimensional array containing up to two elements: 'keys' which always contains an array of placeholder keys that were set, and optionally, if the restore parameter is true, 'restore' containing an array of placeholder values that were overwritten by the method.

``` php
$modx->toPlaceholder('name','John','my');
```

## See Also

- [modX.toPlaceholders](extending-modx/modx-class/reference/modx.toplaceholders "modX.toPlaceholders")
- [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder")
- [modX.setPlaceholders](extending-modx/modx-class/reference/modx.setplaceholders "modX.setPlaceholders")
- [modX.getPlaceholder](extending-modx/modx-class/reference/modx.getplaceholder "modX.getPlaceholder")

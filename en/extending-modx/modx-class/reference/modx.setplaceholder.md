---
title: "modX.setPlaceholder"
_old_id: "1106"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.setplaceholder"
---

## modX::setPlaceholder

Sets a Placeholder value, corresponding to the "+" syntax.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::setPlaceholder()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::setPlaceholder())

``` php 
void setPlaceholder (string $key, mixed $value)
```

## Example

``` php 
$modx->setPlaceholder('name','Barry');
```

This causes the placeholder \[\[+name\]\] to be available inside your templates or page content.

## See Also

- [modX.getPlaceholder](extending-modx/core-model/modx/modx.getplaceholder "modX.getPlaceholder")
- [modX.setPlaceholders](extending-modx/core-model/modx/modx.setplaceholders "modX.setPlaceholders")
- [modX.toPlaceholder](extending-modx/core-model/modx/modx.toplaceholder "modX.toPlaceholder")
- [modX.toPlaceholders](extending-modx/core-model/modx/modx.toplaceholders "modX.toPlaceholders")
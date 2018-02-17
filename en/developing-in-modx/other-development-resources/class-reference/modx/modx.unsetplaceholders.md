---
title: "modX.unsetPlaceholders"
_old_id: "1113"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.unsetplaceholders"
---

## modX::unsetPlaceholders

Unset multiple placeholders, either by prefix or an array of keys.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::unsetPlaceholders()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::unsetPlaceholders())

```
<pre class="brush: php">
void unsetPlaceholders (string|array $keys)

```## Example

Unset the 'my.name' and 'my.email' Placeholders.

```
<pre class="brush: php">
$modx->unsetPlaceholders(array('my.name','my.email'));

```Unset all Placeholders that are prefixed with 'my.'

```
<pre class="brush: php">
$modx->unsetPlaceholders('my.');

```## See Also

- [modX.unsetPlaceholder](developing-in-modx/other-development-resources/class-reference/modx/modx.unsetplaceholder "modX.unsetPlaceholder")
- [modX.setPlaceholder](developing-in-modx/other-development-resources/class-reference/modx/modx.setplaceholder "modX.setPlaceholder")
- [modX.setPlaceholders](developing-in-modx/other-development-resources/class-reference/modx/modx.setplaceholders "modX.setPlaceholders")
- [modX.toPlaceholder](developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholder "modX.toPlaceholder")
- [modX.toPlaceholders](developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholders "modX.toPlaceholders")
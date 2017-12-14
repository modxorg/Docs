---
title: "modX.setPlaceholder"
_old_id: "1106"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.setplaceholder"
---

modX::setPlaceholder
--------------------

Sets a Placeholder value, corresponding to the "+" syntax.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::setPlaceholder()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::setPlaceholder())

```
<pre class="brush: php">
void setPlaceholder (string $key, mixed $value)

```Example
-------

```
<pre class="brush: php">
$modx->setPlaceholder('name','Barry');

```This causes the placeholder \[\[+name\]\] to be available inside your templates or page content.

See Also
--------

- [modX.getPlaceholder](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getplaceholder "modX.getPlaceholder")
- [modX.setPlaceholders](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.setplaceholders "modX.setPlaceholders")
- [modX.toPlaceholder](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholder "modX.toPlaceholder")
- [modX.toPlaceholders](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholders "modX.toPlaceholders")
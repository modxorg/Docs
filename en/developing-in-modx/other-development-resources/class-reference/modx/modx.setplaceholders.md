---
title: "modX.setPlaceholders"
_old_id: "1107"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.setplaceholders"
---

## modX::setPlaceholders

Sets a collection of placeholders stored in an array or as object vars. 
An optional namespace parameter can be prepended to each placeholder key in the collection, to isolate the collection of placeholders.

Note that unlike [modX.toPlaceholders](developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholders "modX.toPlaceholders") and [modX.getChunk](developing-in-modx/other-development-resources/class-reference/modx/modx.getchunk "modX.getChunk"), this function does not add separators between the namespace and the placeholder key. Use [toPlaceholders()](developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholders "modX.toPlaceholders") when working with multi-dimensional arrays or objects with variables other than scalars so each level gets delimited by a separator.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::setPlaceholders()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::setPlaceholders())

```
<pre class="brush: php">
void setPlaceholders (array|object  $placeholders, [string $namespace = ''])

```Unlike \[getChunk\], the **$placeholders** array can _not_ be deeply nested. It must be a simple associative array.

## Example

Add an array of placeholders, and prefix 'my.' to their key.

```
<pre class="brush: php">
$modx->setPlaceholders(array(
   'name' => 'John',
   'email' => 'jdoe@gmail.com',
),'my.');

```## See Also

- [modX.toPlaceholder](developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholder "modX.toPlaceholder")
- [modX.toPlaceholders](developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholders "modX.toPlaceholders")
- [modX.setPlaceholder](developing-in-modx/other-development-resources/class-reference/modx/modx.setplaceholder "modX.setPlaceholder")
- [modX.getPlaceholder](developing-in-modx/other-development-resources/class-reference/modx/modx.getplaceholder "modX.getPlaceholder")
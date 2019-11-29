---
title: "modX.toPlaceholders"
_old_id: "1110"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.toplaceholders"
---

## modX::toPlaceholders

 Sets placeholders from values stored in arrays and objects.

 Each recursive level in the **$placeholders** array adds to the prefix, building an access path using an optional separator.

## Syntax

 API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::toPlaceholders()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::toPlaceholders())

``` php
array toPlaceholders (array|object  $subject, [string $prefix = ''], [string $separator = '.'], [boolean $restore = false])
```

## Example

 Set an array of placeholders and prefix with 'my.' Returns a multi-dimensional array containing up to two elements: 'keys' which always contains an array of placeholder keys that were set, and optionally, if the restore parameter is true, 'restore' containing an array of placeholder values that were overwritten by the method.

``` php
$modx->toPlaceholders(array(
  'name' => 'John',
  'email' => 'jdoe@gmail.com',
),'my');
```

## Example with Nested Placeholders

 Using nested data as the **$placeholders**:

``` php
$modx->toPlaceholders(array(
  'document' => array('pagetitle' => 'My Page')
));
```

 Corresponds to placeholders such as `[[+document.pagetitle]]`

 Note that using a $prefix on nested placeholders adds the $prefix to the front of _each key_. For example:

``` php
$modx->toPlaceholders(
  array(
    'test' => 'this',
    'document' => array('pagetitle' => 'My Page')
  ), 'tmp'
);
```

 Would have placeholders such as `[[+tmp.test]]` and `[[+tmp.document.pagetitle]]`

## See Also

- [modX.toPlaceholder](extending-modx/modx-class/reference/modx.toplaceholder "modX.toPlaceholder")
- [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder")
- [modX.setPlaceholders](extending-modx/modx-class/reference/modx.setplaceholders "modX.setPlaceholders")
- [modX.getPlaceholder](extending-modx/modx-class/reference/modx.getplaceholder "modX.getPlaceholder")

---
title: "modX.paramValueIsTrue"
description: "Reads a parameter and reports whether its value counts as true"
---

## modX::paramValueIsTrue

Reads `$params[$key]` and accepts only `true`, `'true'`, `1` and `'1'`. Anything else counts as false, including a missing key, `'TRUE'`, `'on'` and `'yes'`.

Use `$returnBoolAsString` when the result is written into generated code: JavaScript built through nowdoc or heredoc cannot take a PHP boolean literal.

## Syntax

``` php
bool paramValueIsTrue (array $params, string|int $key, [bool $returnBoolAsString = false])
```

- `$params` _(array)_ parameters to read
- `$key` _(string|int)_ key to evaluate
- `$returnBoolAsString` _(bool)_ return `'true'` or `'false'` instead of booleans, by default `false`

## Example

``` php
$props = array('grow' => 'true', 'resize' => '0');

$grow = $modx->paramValueIsTrue($props, 'grow');        // true
$resize = $modx->paramValueIsTrue($props, 'resize');    // false
$flag = $modx->paramValueIsTrue($props, 'grow', true);  // 'true'
```

## See Also

- [modX](extending-modx/core-model/modx)

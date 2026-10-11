---
title: "modUser.generatePassword"
description: "Return a random password built from a configurable alphabet"
---

## modUser::generatePassword

Builds the password from `random_bytes()`, one character per position in the alphabet.

A `null` `$length` reads the `password_generated_length` setting; the result is then raised to the `password_min_length` minimum. `$options['allowable_characters']` replaces the alphabet; other keys in `$options` are ignored.

## Syntax

``` php
string generatePassword ([integer $length = null [, array $options = array()]])
```

- `$length` _(integer)_ Password length, by default `null`.
- `$options` _(array)_ Holds `allowable_characters`, by default `array()`.

## Example

``` php
$password = $user->generatePassword();
$pin      = $user->generatePassword(20, array('allowable_characters' => '0123456789'));
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [password_generated_length](building-sites/settings/password_generated_length)
- [password_min_length](building-sites/settings/password_min_length)

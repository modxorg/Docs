---
title: "modX.sanitizeString"
description: "Cuts tags and forbidden characters out of a string and keeps only a safe character set"
---

## modX::sanitizeString

Removes HTML tags from a string, deletes a fixed list of characters, then keeps only letters, digits, `_`, `-`, `.`, `/`, spaces and `[`. Characters are dropped, never escaped, so the result can go straight into a query or a class key.

Core uses it on request values that end up in SQL or manager logic, such as namespace foreign keys and manager login flags.

## Syntax

``` php
string sanitizeString (string $str, [array $chars = ['/', "'", '"', '(', ')', ';', '>', '<']], [string $allowedTags = ''])
```

- `$str` _(string)_ value to sanitize
- `$chars` _(array)_ characters deleted after tag stripping; the default list is shown in the signature
- `$allowedTags` _(string)_ tags kept by PHP `strip_tags()`, by default none are kept

## Example

``` php
$clean = $modx->sanitizeString('<b>foobar</b> (staff)');

// $clean === 'foobar staff'
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.stripTags](extending-modx/modx-class/reference/modx.striptags)

---
title: "modX.stripTags"
description: "Removes HTML tags and pattern matches from a string"
---

## modX::stripTags

Strips HTML and PHP tags with PHP `strip_tags()`, then deletes regex patterns from the result. Every pattern is applied repeatedly until it stops matching or `$depth` runs are reached.

The default set in `modX::$sanitizePatterns` removes `<script>` blocks, numeric entities, `[[...]]` tags and bare `[[` or `]]` markers. Pass a value that is not an array, such as `null`, to skip the pattern stage.

## Syntax

``` php
string stripTags (string $html, [string $allowed = ''], [array $patterns = array()], [int $depth = 10])
```

- `$html` _(string)_ content to clean
- `$allowed` _(string)_ tags kept by `strip_tags()`, by default none are kept
- `$patterns` _(array)_ patterns to delete; an empty array selects `modX::$sanitizePatterns`, by default `array()`
- `$depth` _(int)_ applications per pattern, by default `10`; a zero value becomes `10`

## Example

``` php
$clean = $modx->stripTags('<p>Hello [[+name]]</p>');
// 'Hello '

$clean = $modx->stripTags('<p>Hello [[+name]]</p>', '<p>');
// '<p>Hello </p>'
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.sanitizeString](extending-modx/modx-class/reference/modx.sanitizestring)

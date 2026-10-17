---
title: "xPDO.escSplit"
description: "Split a string on a character, ignoring escaped occurrences."
_old_id: "1847"
_old_uri: "2.x/class-reference/xpdo/xpdo.escsplit"
---

## xPDO::escSplit

Splits a string on a delimiter character while respecting an escape token (backticks by default), so escaped delimiters do not split the string. This is a utility used when parsing column lists that may contain escaped identifiers.

## Syntax

``` php
array escSplit (string $char, string $str, [string $escToken = '`'], [integer $limit = 0])
```

- `$char` — the delimiter character.
- `$str` — the string to split.
- `$escToken` — the escape character to respect.
- `$limit` — an optional maximum number of elements to return.

## Example

``` php
$parts = xPDO::escSplit(',', 'id,name,`weird,col`');
// array('id', 'name', '`weird,col`')
```

## See Also

- [xPDO.escape](extending-modx/xpdo/class-reference/xpdo/xpdo.escape "xPDO.escape")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
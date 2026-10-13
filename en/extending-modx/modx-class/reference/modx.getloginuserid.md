---
title: "modX.getLoginUserID"
description: "Returns the current user ID for the current or specified context."
_old_id: "1066"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getloginuserid"
---

## modX::getLoginUserID

Returns the current user ID for the current or specified context.

## Syntax

``` php
integer getLoginUserID ([string $context = ''])
```

Returns the user id as an integer; `0` if no user is logged in for the context.

## Example

Get the current login user ID for the 'sports' context.

``` php
$id = $modx->getLoginUserID('sports');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")

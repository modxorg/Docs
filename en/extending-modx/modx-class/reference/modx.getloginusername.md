---
title: "modX.getLoginUserName"
description: "Returns the current user name, for the current or specified context."
_old_id: "1067"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getloginusername"
---

## modX::getLoginUserName

Returns the current user name, for the current or specified context.

## Syntax

``` php
string getLoginUserName ([string $context = ''])
```

## Example

Grab the user's username in the current Context.

``` php
$username = $modx->getLoginUserName();
```

## See Also

- [Contexts](building-sites/contexts "Contexts")

---
title: "modX.getAuthenticatedUser"
description: "Gets the user authenticated in the specified context."
_old_id: "1059"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getauthenticateduser"
---

## modX::getAuthenticatedUser

Gets the user authenticated in the specified context.

## Syntax

``` php
modUser|null getAuthenticatedUser ([string $contextKey = ''])
```

Returns the `modUser` object authenticated in the given context, or `null` if no user is logged in there. Without an argument the current context is used.

## Example

Get the authenticated user for the 'sports' context:

``` php
$user = $modx->getAuthenticatedUser('sports');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.getUser](extending-modx/modx-class/reference/modx.getuser)

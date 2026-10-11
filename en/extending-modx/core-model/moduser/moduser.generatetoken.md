---
title: "modUser.generateToken"
description: "Build the uniqid auth token for the User"
---

## modUser::generateToken

Builds the token from the site id, the User id and `uniqid()`. The token differs per site and per User and is unique within the request. `addSessionContext()` stores it as the per-context session token that `getUserToken()` reads.

## Syntax

``` php
string generateToken (string $salt)
```

- `$salt` _(string)_ Ignored; any value satisfies the signature.

## Example

``` php
$token = $user->generateToken('web');
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.addSessionContext](extending-modx/core-model/moduser/moduser.addsessioncontext)
- [modUser.getUserToken](extending-modx/core-model/moduser/moduser.getusertoken)

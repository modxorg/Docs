---
title: "modUser.getUserToken"
description: "Read the per-context auth token from the session"
---

## modUser::getUserToken

Returns the token that `addSessionContext()` stored under `modx.{context}.user.token` when the User logged into that context. An empty `$ctx` resolves to the current context key.

Nothing stored means an empty string: the User never entered the context, or `removeSessionContextVars()` cleared the entry.

## Syntax

``` php
string getUserToken ([string $ctx = ''])
```

- `$ctx` _(string)_ Context key to read from, by default `''` (current context).

## Example

``` php
$token = $modx->user->getUserToken($modx->context->get('key'));
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.generateToken](extending-modx/core-model/moduser/moduser.generatetoken)
- [modUser.removeSessionContextVars](extending-modx/core-model/moduser/moduser.removesessioncontextvars)
- [Security](extending-modx/security)

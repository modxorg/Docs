---
title: "modUser.addSessionContext"
_old_id: "1340"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.addsessioncontext"
---

## modUser::addSessionContext

Adds a new context to the user session context array.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::addSessionContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::addSessionContext())

``` php
void addSessionContext (string $context)
```

## Example

Add a 'sports' Context session to the user.

``` php
$modx->addSessionContext('sports');
```

## See Also

| Page: [modUser](extending-modx/core-model/moduser) |
|---------------------------------------------------------------------------------------------------------|
| Page: [Users](building-sites/client-proofing/security/users) |
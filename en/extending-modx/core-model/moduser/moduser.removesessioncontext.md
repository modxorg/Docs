---
title: "modUser.removeSessionContext"
_old_id: "1349"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.removesessioncontext"
---

## modUser::removeSessionContext

Removes a user session context.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::removeSessionContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::removeSessionContext())

``` php
void removeSessionContext (string|array $context)
```

## Example

Remove the session for the User in the 'sports' Context.

``` php
$user->removeSessionContext('sports');
```

## See Also

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
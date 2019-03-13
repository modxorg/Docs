---
title: "modUser.getSessionContexts"
_old_id: "1343"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.getsessioncontexts"
---

## modUser::getSessionContexts

Returns an array of user session context keys.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::getSessionContexts()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::getSessionContexts())

``` php 
array getSessionContexts ()
```

## Example

Get all user seesion contexts for this user that is logged into the web and mgr contexts:

``` php 
$keys = $user->getSessionContexts();
print_r($keys); // prints Array ( 'web', 'mgr' );
```

## See Also

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
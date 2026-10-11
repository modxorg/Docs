---
title: "modUser.getSessionContexts"
_old_id: "1343"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.getsessioncontexts"
description: "List the Context keys the User is logged into"
---

## modUser::getSessionContexts

Returns the session Contexts of this User as an array of `context key => User id`.

## Syntax

``` php
array getSessionContexts ()
```

## Example

``` php
$keys = $user->getSessionContexts();
print_r($keys); // e.g. array('web' => 1, 'mgr' => 1);
```

## See Also

- [modUser](extending-modx/core-model/moduser "modUser")

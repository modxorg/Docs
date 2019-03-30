---
title: "modX.getAuthenticatedUser"
_old_id: "1059"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getauthenticateduser"
---

## modX::getAuthenticatedUser

 Gets the user authenticated in the specified context.

## Syntax

 API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getAuthenticatedUser()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getAuthenticatedUser())

 ``` php 
unknown getAuthenticatedUser ([string $contextKey = ''])
```

## Example

 Get the authenticated user for the 'sports' context:

 ``` php 
$user = $modx->getAuthenticatedUser('sports');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modx.getUser](extending-modx/modx-class/reference/modx.getuser)
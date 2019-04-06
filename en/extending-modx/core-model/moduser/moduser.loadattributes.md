---
title: "modUser.loadAttributes"
_old_id: "1348"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.loadattributes"
---

## modUser::loadAttributes

Loads the principal attributes that define a modUser security profile.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::loadAttributes()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::loadAttributes())

``` php
void loadAttributes ( $target, [ $context = ''], [ $reload = false])
```

## Example

Load attributes for the 'sports' context and the modResource target.

``` php
$user->loadAttributes('modResource','sports',true);
```

## See Also

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
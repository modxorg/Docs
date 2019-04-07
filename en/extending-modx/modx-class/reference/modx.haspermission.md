---
title: "modX.hasPermission"
_old_id: "1083"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.haspermission"
---

## modX::hasPermission

 Returns true if user has the specified policy permission.

## Syntax

 API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::hasPermission()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::hasPermission())

 ``` php
boolean hasPermission (string|array $pm)
```

## Example

 Deny the user access if they don't have the permission 'edit\_chunk' in their loaded Policies.

 ``` php
$pm = 'edit_chunk';
if (!$modx->hasPermission($pm)) {
    die('Access Denied!');
}
```

 It's also possible to check if the user has multiple permissions, like 'edit\_chunk' and 'edit\_template'. Like;

 ``` php
$pm = array('edit_chunk' => true, 'edit_template' => true);
if (!$modx->hasPermission($pm)) {
    die ('Access Denied!');
}
```

## See Also

- [Policies](building-sites/client-proofing/security/policies "Policies")
---
title: "modUser.changePassword"
_old_id: "1341"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.changepassword"
---

## modUser::changePassword

Changes the password of a user. It first matches the oldPassword you specify to the current password using modUser->passwordMatches($oldPassword), then sets the password and finally it invokes the [OnUserChangePassword](developing-in-modx/basic-development/plugins/system-events/onuserchangepassword "OnUserChangePassword") event. Returns true if the password was changed, false if not.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::changePassword()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::changePassword())

``` php 
boolean changePassword (string $newPassword, string $oldPassword)

```

## Example

Change the password of the user 'foobar' from 'boo123' to 'b33r4me'

``` php 
$user = $modx->getObject('modUser',array('username' => 'foobar'));
$user->changePassword('b33r4me', 'boo123');

```

Change the password of the user currently logged in from 'mypass' to 's3cur3d'.

``` php 
$modx->user->changePassword('s3cur3d','mypass');

```

## See Also

| Page: [modUser](developing-in-modx/other-development-resources/class-reference/moduser) |
|---------------------------------------------------------------------------------------------------------|
| Page: [Users](administering-your-site/security/users) |
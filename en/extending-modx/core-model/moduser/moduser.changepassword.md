---
title: "modUser.changePassword"
_old_id: "1341"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.changepassword"
description: "Change a User's password, optionally checking the old one"
---

## modUser::changePassword

Changes the password of a User. Returns `true` if the password changed, `false` otherwise.

By default, `changePassword()`:

1. matches `$oldPassword` against the current password with `modUser->passwordMatches()`;
2. sets the new password;
3. invokes the [OnUserChangePassword](extending-modx/plugins/system-events/onuserchangepassword "OnUserChangePassword") event.

Pass `$validateOldPassword` as `false` to skip the old-password check.

## Syntax

``` php
boolean changePassword (string $newPassword, string $oldPassword [, boolean $validateOldPassword = true])
```

## Example

``` php
$user = $modx->getObject('modUser',array('username' => 'foobar'));
$user->changePassword('b33r4me', 'boo123');
```

Change the password of the currently logged-in User from 'mypass' to 's3cur3d':

``` php
$modx->user->changePassword('s3cur3d','mypass');
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [Users](building-sites/client-proofing/security/users)

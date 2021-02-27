---
title: "modX.getUser"
_old_id: "1078"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getuser"
---

## modX::getUser

Get the current authenticated User and assigns it to the modX instance.

## Syntax

API Doc: [modX::getUser()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getUser())

``` php
modUser getUser ([string $contextKey = ''])
```

## Example

Get the current auth'ed user and print out its username.

``` php
$user = $modx->getUser();
echo $user->get('username');
```

Get the user's email address (stored in their profile):

``` php
$user = $modx->getUser();
if (!$user) return '';
$profile = $user->getOne('Profile');
if (!$profile) return '';
print $profile->get('email');
```

Get an extended field from the user.

``` php
$user = $modx->getUser();
if (!$user) return '';
$profile = $user->getOne('Profile');
if (!$profile) return '';
$extended = $profile->get('extended');
print (isset($extended['custom_user_field'])) ? $extended['custom_user_field'] : '';
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modx.getAuthenticatedUser](extending-modx/modx-class/reference/modx.getauthenticateduser)

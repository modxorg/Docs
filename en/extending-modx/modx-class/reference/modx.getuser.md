---
title: "modX.getUser"
description: "Get the current authenticated User and assigns it to the modX instance"
---

## modX::getUser

Get the current authenticated User and assigns it to the modX instance.

## Syntax

API Doc: [modX::getUser()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getUser())

``` php
modUser getUser ([string $contextKey = ''], [bool $forceLoadSettings = false])
```

- `$contextKey` _(string)_ Indicates the context to initialize, an optional context to get the user from.
- `$forceLoadSettings` _(bool)_ If set to true, will load settings regardless of whether the user has an authenticated context or not

## Example

Get the current auth'ed user and print out its username.

``` php
$user = $modx->getUser();
echo $user->get('username');
```

Get the user's email address (stored in their profile) from 'web' context:

``` php
$user = $modx->getUser('web', true);
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

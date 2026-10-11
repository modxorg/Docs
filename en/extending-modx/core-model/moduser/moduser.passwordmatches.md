---
title: "modUser.passwordMatches"
description: "Verify a plain password against the hash stored for the User"
---

## modUser::passwordMatches

Hashes the candidate with the class named by `hash_class` through the hashing service and compares the result with the stored `password` field. `changePassword()` uses it to validate the old password.

`$options` are merged with the User's own `salt` as the base, so a `salt` key passed here wins. The hash implementation defines how the rest of the options are used. `modPBKDF2` reads `salt`, `iterations`, `derived_key_length`, `algorithm` and `raw_output`; the default `modNative` runs `password_verify()` and ignores them. If the hashing service does not load, the method returns `false`.

## Syntax

``` php
boolean passwordMatches (string $password [, array $options = array()])
```

- `$password` _(string)_ Plain password to check against the stored hash.
- `$options` _(array)_ Implementation-specific hashing options, by default `array()`.

## Example

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));

if ($user->passwordMatches('s3cur3d')) {
    echo 'ok';
}
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.changePassword](extending-modx/core-model/moduser/moduser.changepassword)

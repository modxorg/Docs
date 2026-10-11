---
title: "modUser.set"
description: "Assign a User field, refusing sudo and hashing password values"
---

## modUser::set

Sets a field like the xPDO setter, but intercepts `sudo` and the password fields first.

The `sudo` key is refused with `false` unless the `setup` option is set on the xpdo instance. A bulk assignment from request data then cannot grant itself full access. `setSudo()` exists for that.

`password` and `cachepwd` are hashed with the class named by `hash_class` before they are stored. A User without a `salt` gets one generated on the first write and reused afterwards.

## Syntax

``` php
boolean set (mixed $k [, mixed $v = null [, string $vType = '']])
```

- `$k` _(mixed)_ Field name or field key.
- `$v` _(mixed)_ Value to assign, by default `null`.
- `$vType` _(string)_ Callable or type hint passed to the parent implementation, by default `''`.

## Example

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));

$user->set('sudo', 1);              // false outside of setup
$user->set('password', 's3cur3d');  // stored as a hash
$user->save();
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.setSudo](extending-modx/core-model/moduser/moduser.setsudo)
- [modUser.changePassword](extending-modx/core-model/moduser/moduser.changepassword)

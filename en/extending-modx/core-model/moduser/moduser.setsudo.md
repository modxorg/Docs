---
title: "modUser.setSudo"
description: "Write the sudo flag directly, bypassing the restriction in set()"
---

## modUser::setSudo

Writes the `sudo` field directly and marks it dirty: `set()` refuses that key outside of setup. It always returns `true` and never hashes or validates anything.

A sudo user bypasses every Access Permissions check. The flag has an effect only after `save()`.

## Syntax

``` php
boolean setSudo (boolean $sudo)
```

- `$sudo` _(boolean)_ Value cast to boolean before it is stored.

## Example

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));
$user->setSudo(true);
$user->save();
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.set](extending-modx/core-model/moduser/moduser.set)

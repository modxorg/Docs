---
title: "modUser.removeLocks"
description: "Release the resource locks this User holds in the registry"
---

## modUser::removeLocks

Releases the resource locks this User holds. It reads the `locks` registry directory, subscribes to `/resource/` and pulls every lock message owned by this User. `endSession()` calls the method with no arguments before the session is destroyed.

`$options` has no effect: the body never reads it, even though the docblock promises control over lock types. The return value reports whether the scan ran, not whether anything was unlocked. It is `false` when the xpdo instance is not a modX or the registry service will not load.

## Syntax

``` php
boolean removeLocks ([array $options = array()])
```

- `$options` _(array)_ Accepted but unused, by default `array()`.

## Example

``` php
$user->removeLocks();
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.endSession](extending-modx/core-model/moduser/moduser.endsession)

---
title: "modResource.addLock"
description: "Take an editing lock on a Resource"
---

## modResource.addLock

Writes a lock record into the `locks` registry (`modDbRegister`) under `/resource/`, keyed by the md5 of the Resource ID. The lock lives for `lock_ttl` seconds, 360 by default, and a second call by the same user renews it.

The return value is not always boolean. `true` grants the lock; an integer is the ID of the current holder; `false` means the method ran outside `modX`. Compare with `=== true` to test whether the lock is yours.

## Syntax

``` php
boolean|integer addLock ([int $user = 0 [, array $options = array()]])
```

- `$user` _(integer)_ lock owner; `0` selects the logged-in user
- `$options` _(array)_ read for the `lock_ttl` option, by default `array()`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
if ($resource->addLock() === true) {
    echo 'lock granted';
}
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getLock](extending-modx/core-model/modresource/modresource.getlock)
- [modResource.removeLock](extending-modx/core-model/modresource/modresource.removelock)

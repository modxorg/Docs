---
title: "modResource.removeLock"
description: "Release the editing lock on a Resource"
---

## modResource.removeLock

Drops the lock record, but only when it is free or held by the given user.

Returns `false` when another user holds the lock, when not running under `modX`, or when the registry service is unavailable. In those cases nothing is removed.

## Syntax

``` php
boolean removeLock ([int $user = 0])
```

- `$user` _(int)_ user whose lock is to be released; `0` selects the logged-in user

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->removeLock();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.addLock](extending-modx/core-model/modresource/modresource.addlock)
- [modResource.getLock](extending-modx/core-model/modresource/modresource.getlock)

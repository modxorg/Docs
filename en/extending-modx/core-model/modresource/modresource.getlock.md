---
title: "modResource.getLock"
description: "Read the ID of the user holding the Resource lock"
---

## modResource.getLock

Reads one message from the `locks` registry without removing it and returns the user ID stored there. The registry is subscribed per Resource, so only this Resource's lock is read.

Returns `0` for a free lock, outside `modX`, or when the registry service cannot be loaded.

## Syntax

``` php
integer getLock ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$lockedBy = $resource->getLock();
if ($lockedBy) {
    echo 'locked by user ' . $lockedBy;
}
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.addLock](extending-modx/core-model/modresource/modresource.addlock)
- [modResource.removeLock](extending-modx/core-model/modresource/modresource.removelock)

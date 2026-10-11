---
title: "modUser.remove"
description: "Delete the User and fire the OnUserBeforeRemove and OnUserRemove events"
---

## modUser::remove

Removes the User record and wraps the xPDO removal in the two User events. Both events run whenever the xpdo instance is a modX: `OnUserRemove` fires even when the parent removal returned `false`, unlike `OnUserSave` in `save()`.

`$ancestors` carries the objects already removed in the current chain, which xPDO uses to break circular references. Top-level calls leave it empty.

## Syntax

``` php
boolean remove ([array $ancestors = array()])
```

- `$ancestors` _(array)_ Already removed objects, by default `array()`.

## Example

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));
$user->remove();
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [OnUserBeforeRemove](extending-modx/plugins/system-events/onuserbeforeremove)
- [OnUserRemove](extending-modx/plugins/system-events/onuserremove)

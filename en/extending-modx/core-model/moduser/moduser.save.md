---
title: "modUser.save"
description: "Persist the User and fire the OnUserBeforeSave and OnUserSave events"
---

## modUser::save

Saves the object and wraps the xPDO save in the two User events. A new object whose `createdon` is below 1 gets the current timestamp first.

Both events fire only when the xpdo instance is a modX. `OnUserSave` fires only if the parent save succeeded; `OnUserBeforeSave` fires before the attempt either way.

## Syntax

``` php
boolean save ([boolean $cacheFlag = false])
```

- `$cacheFlag` _(boolean)_ Passed to `xPDOObject::save()`; by default `false`. An integer value is a cache lifetime in seconds.

## Example

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));
$user->set('active', 1);
$user->save();
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [OnUserBeforeSave](extending-modx/plugins/system-events/onuserbeforesave)
- [OnUserSave](extending-modx/plugins/system-events/onusersave)

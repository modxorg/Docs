---
title: "OnBeforeUserDuplicate"
description: "Fires before a User is duplicated in the manager."
---

## Event: OnBeforeUserDuplicate

Declared as the `beforeSaveEvent` of the User duplicate processor (`Security\User\Duplicate`), but the core DuplicateProcessor never invokes it. It does not fire in MODX 3.x.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

None.

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

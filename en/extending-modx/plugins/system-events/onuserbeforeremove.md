---
title: "OnUserBeforeRemove"
description: "Fires right before a User is removed, in modUser::remove()."
_old_id: "469"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuserbeforeremove"
---

## Event: OnUserBeforeRemove

Fires right before a User is removed, in `modUser::remove()`.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name      | Description                                                |
| --------- | ---------------------------------------------------------- |
| user      | A reference to the modUser object.                         |
| ancestors | An array of ancestors passed to `remove()`.                 |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

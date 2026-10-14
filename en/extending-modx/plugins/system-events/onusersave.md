---
title: "OnUserSave"
description: "Fires after a User is saved, in modUser::save()."
_old_id: "476"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onusersave"
---

## Event: OnUserSave

Fires after a User is saved, in `modUser::save()`.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name      | Description                                                                                                  |
| --------- | ------------------------------------------------------------------------------------------------------------ |
| user      | A reference to the modUser object.                                                                           |
| mode      | `modSystemEvent::MODE_NEW` (`new`) for a new object, `modSystemEvent::MODE_UPD` (`upd`) for an existing one. |
| cacheFlag | The `cacheFlag` argument passed to `save()`.                                                                 |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

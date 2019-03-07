---
title: "OnUserSave"
_old_id: "476"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onusersave"
---

## Event: OnUserSave

Fires when a User is saved.

Service: 1 - Parser Service Events 
Group: modUser

## Event Parameters

| Name | Description                                                                                                                            |
| ---- | -------------------------------------------------------------------------------------------------------------------------------------- |
| user | A reference to the modUser object.                                                                                                     |
| mode | Either 'new' (modSystemEvent::MODE\_NEW) or 'upd' (modSystemEvent::MODE\_UPD) depending on whether is a new object or an existing one. |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
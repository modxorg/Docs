---
title: "OnUserBeforeSave"
_old_id: "470"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuserbeforesave"
---

## Event: OnUserBeforeSave

Fires right before a User is saved.

Service: 1 - Parser Service Events 
Group: modUser

## Event Parameters

| Name | Description                                                                                                                            |
| ---- | -------------------------------------------------------------------------------------------------------------------------------------- |
| user | A reference to the modUser object.                                                                                                     |
| mode | Either 'new' (modSystemEvent::MODE\_NEW) or 'upd' (modSystemEvent::MODE\_UPD) depending on whether is a new object or an existing one. |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
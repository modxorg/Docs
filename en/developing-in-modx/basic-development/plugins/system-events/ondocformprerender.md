---
title: "OnDocFormPrerender"
_old_id: "420"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocformprerender"
---

## Event: OnDocFormPrerender

Fires before a Resource editing form is loaded in the manager.

Service: 1 - Parser Service Events 
Group: Documents

## Event Parameters

| Name | Description |
|------|-------------|
| mode | Either 'new' or 'upd', depending on the circumstance. |
| resource | A reference to the modResource object. Will be null for new Resources. |
| id | The ID of the Resource. Will be 0 for new Resources. |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
---
title: "OnPropertySetSave"
description: "Fires right after a Property Set is saved."
_old_id: "454"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetsave"
---

## Event: OnPropertySetSave

Fires right after a Property Set is saved.

- Service: 1 - Parser Service Events
- Group: Property Sets

## Event Parameters

| Name        | Description                                                        |
| ----------- | ------------------------------------------------------------------ |
| mode        | Either 'new' or 'upd', depending on the circumstance.              |
| propertySet | A reference to the modPropertySet object.                          |
| cacheFlag   | The cache flag passed to the save operation.                       |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

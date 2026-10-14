---
title: "OnPropertySetBeforeSave"
description: "Fires right before a Property Set is saved."
_old_id: "452"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpropertysetbeforesave"
---

## Event: OnPropertySetBeforeSave

Fires right before a Property Set is saved.

- Service: 1 - Parser Service Events
- Group: Property Sets

## Event Parameters

| Name        | Description                                           |
| ----------- | ----------------------------------------------------- |
| mode        | Either 'new' or 'upd', depending on the circumstance. |
| propertySet | A reference to the modPropertySet object.             |
| cacheFlag   | The cache flag passed to the save operation.          |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

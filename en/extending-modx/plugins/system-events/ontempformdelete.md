---
title: "OnTempFormDelete"
description: "Fires after a Template is deleted in the Manager."
---

## Event: OnTempFormDelete

Fires after a Template is deleted in the Manager.

- Service: 1 - Parser Service Events
- Group: Templates

## Event Parameters

| Name     | Description                              |
| -------- | ---------------------------------------- |
| id       | The ID of the deleted Template.          |
| template | A reference to the modTemplate object.   |
| object   | Alias of `template` — a reference to the same object. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

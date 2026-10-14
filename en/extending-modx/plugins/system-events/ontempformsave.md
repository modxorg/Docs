---
title: "OnTempFormSave"
description: "Fires after a Template is created or updated in the Manager."
---

## Event: OnTempFormSave

Fires after a Template is created or updated in the Manager.

- Service: 1 - Parser Service Events
- Group: Templates

## Event Parameters

| Name     | Description                             |
| -------- | --------------------------------------- |
| mode     | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| id       | The ID of the Template.                 |
| template | A reference to the modTemplate object.  |
| object   | Alias of `template` — a reference to the same object. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

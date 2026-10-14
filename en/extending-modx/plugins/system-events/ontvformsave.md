---
title: "OnTVFormSave"
description: "Fires after a TV is created or updated in the Manager."
---

## Event: OnTVFormSave

Fires after a TV is created or updated in the Manager.

- Service: 1 - Parser Service Events
- Group: Template Variables

## Event Parameters

| Name   | Description                                                      |
| ------ | ---------------------------------------------------------------- |
| mode   | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| id     | The ID of the TV.                                                |
| tv     | A reference to the modTemplateVar object.                        |
| object | Alias of `tv` — a reference to the same object.                  |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnFileEditFormPrerender"
description: "Fires before the file editor form is rendered in the manager."
---

## Event: OnFileEditFormPrerender

Fires before the file editor form is rendered in the manager.

- Service: 1 - Parser Service Events
- Group: System

## Event Parameters

| Name | Description                                                                                       |
| ---- | ------------------------------------------------------------------------------------------------- |
| mode | Always 'upd' (`modSystemEvent::MODE_UPD`).                                                        |
| file | The path of the file being edited.                                                                |
| fa   | An array of information about the file, including the ID of the Media Source the file belongs to. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnBeforeTVFormSave"
description: "Fires before a TV is saved in the Manager."
_old_id: "394"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetvformsave"
---

## Event: OnBeforeTVFormSave

Fires after a form is submitted but before a TV is saved in the Manager.

- Service: 1 - Parser Service Events
- Group: Template Variables

## Event Parameters

| Name   | Description                                           |
| ------ | ----------------------------------------------------- |
| mode   | Either 'upd' or 'new', depending on the circumstance. |
| tv     | A reference to the modTemplateVar object.             |
| id     | The ID of the TV. Will be 0 for new TVs.              |
| data   | The current fields of the TV as an array.             |
| object | Alias of `tv` — a reference to the same object.       |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

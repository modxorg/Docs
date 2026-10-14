---
title: "OnTempFormRender"
description: "Fires in the Template create/update controller while the page placeholders are built; the returned output is assigned to the JavaScript variable MODx.onTempFormRender."
---

## Event: OnTempFormRender

Fires in the Template create/update controller while the page placeholders are built. The returned output is assigned to the JavaScript variable `MODx.onTempFormRender`.

- Service: 1 - Parser Service Events
- Group: Templates

## Event Parameters

| Name     | Description                                                                        |
| -------- | ---------------------------------------------------------------------------------- |
| mode     | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`).                    |
| id       | The ID of the Template. This will be 0 for new Templates.                          |
| template | A reference to the modTemplate object. Not passed when creating a new Template.    |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

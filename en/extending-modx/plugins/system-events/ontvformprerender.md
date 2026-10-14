---
title: "OnTVFormPrerender"
description: "Fires in the TV create/update controller after page processing, just before the form template renders; the returned output is inserted into the page HTML."
---

## Event: OnTVFormPrerender

Fires in the TV create/update controller after page processing, just before the form template renders. The returned output is inserted into the page HTML.

- Service: 1 - Parser Service Events
- Group: Template Variables

## Event Parameters

| Name | Description                                                                     |
| ---- | ------------------------------------------------------------------------------- |
| mode | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`).                 |
| id   | The ID of the TV. This will be 0 for new TVs.                                   |
| tv   | A reference to the modTemplateVar object. Not passed when creating a new TV.    |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

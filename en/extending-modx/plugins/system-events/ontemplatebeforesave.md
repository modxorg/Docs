---
title: "OnTemplateBeforeSave"
description: "Fires right before a Template is saved, in modTemplate::save()."
---

## Event: OnTemplateBeforeSave

Fires right before a Template is saved, in `modTemplate::save()`.

- Service: 1 - Parser Service Events
- Group: Templates

## Event Parameters

| Name      | Description                                                      |
| --------- | ---------------------------------------------------------------- |
| mode      | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| template  | A reference to the modTemplate object.                           |
| cacheFlag | The `cacheFlag` argument passed to the `save()` method.          |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

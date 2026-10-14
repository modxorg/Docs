---
title: "OnContextBeforeSave"
description: "Fires right before a Context is saved, in modContext::save()."
---

## Event: OnContextBeforeSave

Fires right before a Context is saved, in `modContext::save()`.

- Service: 1 - Parser Service Events
- Group: Contexts

## Event Parameters

| Name      | Description                                                     |
| --------- | --------------------------------------------------------------- |
| context   | A reference to the modContext object.                           |
| mode      | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| cacheFlag | The cacheFlag argument passed to the save() method.             |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

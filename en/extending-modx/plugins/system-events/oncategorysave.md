---
title: "OnCategorySave"
description: "Fires after a Category is saved, in modCategory::save()."
---

## Event: OnCategorySave

Fires after a Category is saved, in `modCategory::save()`.

- Service: 1 - Parser Service Events
- Group: Categories

## Event Parameters

| Name      | Description                                                     |
| --------- | --------------------------------------------------------------- |
| mode      | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| category  | A reference to the modCategory object.                          |
| cacheFlag | The cacheFlag argument passed to the save() method.             |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

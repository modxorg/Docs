---
title: "OnCategoryBeforeRemove"
description: "Fires right before a Category is removed, in modCategory::remove()."
---

## Event: OnCategoryBeforeRemove

Fires right before a Category is removed, in `modCategory::remove()`.

- Service: 1 - Parser Service Events
- Group: Categories

## Event Parameters

| Name      | Description                                          |
| --------- | ---------------------------------------------------- |
| category  | A reference to the modCategory object.               |
| ancestors | An array of ancestors passed to the remove() method. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

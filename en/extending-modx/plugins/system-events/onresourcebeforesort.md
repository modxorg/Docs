---
title: "OnResourceBeforeSort"
description: "Fires just before the Resource tree is sorted."
---

## Event: OnResourceBeforeSort

Fires just before the Resource tree is sorted.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name     | Description                                                                                                              |
| -------- | ------------------------------------------------------------------------------------------------------------------------ |
| nodes    | An array of nodes about to be sorted; each node has `id`, `context`, `parent` and `order` keys.                          |
| contexts | An array of context keys affected by the sort.                                                                           |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

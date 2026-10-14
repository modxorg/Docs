---
title: "OnResourceSort"
description: "Fires just after the Resource tree is sorted."
---

## Event: OnResourceSort

Fires just after the Resource tree is sorted.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name             | Description                                                                                          |
| ---------------- | ---------------------------------------------------------------------------------------------------- |
| nodes            | An array of sorted nodes; each node has `id`, `context`, `parent` and `order` keys.                   |
| nodesAffected    | An array of the modResource objects that were moved.                                                  |
| contexts         | An array of context keys affected by the sort.                                                        |
| contextsAffected | An array of affected context keys, as context key => true.                                            |
| modifiedNodes    | Alias of `nodesAffected`, kept for backward compatibility.                                            |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

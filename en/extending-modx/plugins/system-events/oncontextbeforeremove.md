---
title: "OnContextBeforeRemove"
description: "Fires right before a Context is removed, in modContext::remove()."
---

## Event: OnContextBeforeRemove

Fires right before a Context is removed, in `modContext::remove()`.

- Service: 1 - Parser Service Events
- Group: Contexts

## Event Parameters

| Name      | Description                                             |
| --------- | ------------------------------------------------------- |
| context   | A reference to the modContext object.                   |
| ancestors | An array of ancestors passed to the remove() method.    |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

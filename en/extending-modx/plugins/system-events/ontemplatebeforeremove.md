---
title: "OnTemplateBeforeRemove"
description: "Fires right before a Template is removed, in modTemplate::remove()."
---

## Event: OnTemplateBeforeRemove

Fires right before a Template is removed, in `modTemplate::remove()`.

- Service: 1 - Parser Service Events
- Group: Templates

## Event Parameters

| Name      | Description                                            |
| --------- | ------------------------------------------------------ |
| template  | A reference to the modTemplate object.                 |
| ancestors | An array of ancestors passed to the `remove()` method. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

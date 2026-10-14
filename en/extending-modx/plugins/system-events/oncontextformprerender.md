---
title: "OnContextFormPrerender"
description: "Fires before the Context editing form loads in the Manager."
---

## Event: OnContextFormPrerender

Fires before the Context editing form loads, only from the Context **update** form. Use it to run custom JavaScript.

- Service: 2 - Manager Access Events
- Group: Contexts

## Event Parameters

| Name    | Description                                        |
| ------- | -------------------------------------------------- |
| key     | The key of the Context.                            |
| context | A reference to the modContext object.              |
| mode    | Always `upd` (`modSystemEvent::MODE_UPD`).         |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnContextFormPrerender"
_old_id: "415"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/oncontextformprerender"
---

## Event: OnContextFormPrerender

Fires prior to the context editing form loading. Useful for running custom javascript.

Service: 2 - Manager Access Events 
Group: modContext

## Event Parameters

| Name    | Description                                        |
| ------- | -------------------------------------------------- |
| key     | The key of the context.                            |
| context | A reference to the modContext object.              |
| mode    | Either 'upd' or 'new', depending on the situation. |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
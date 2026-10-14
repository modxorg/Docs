---
title: "OnContextUpdate"
description: "Fires after a Context is saved in the Manager."
---

## Event: OnContextUpdate

Fires after a Context is saved in the Manager, from the `Context\Update` and `Context\UpdateFromGrid` processors. The event has no entry in the core system event list (`transport.core.events.php`), so it does not appear in the Manager's event dropdown. Plugins can still subscribe to it by name.

- Service: 1 - Parser Service Events
- Group: Contexts

## Event Parameters

| Name       | Description                                       |
| ---------- | ------------------------------------------------- |
| context    | A reference to the modContext object.             |
| properties | An array of the submitted processor properties.  |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

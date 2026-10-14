---
title: "OnPluginEventRemove"
description: "Fires after a plugin is disassociated directly from an event."
_old_id: "444"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onplugineventremove"
---

## Event: OnPluginEventRemove

Fires after a plugin is disassociated directly from an event.

- Service: 1 - Parser Service Events
- Group: Plugin Events

## Event Parameters

| Name        | Description                                             |
| ----------- | ------------------------------------------------------- |
| pluginEvent | A reference to the modPluginEvent object.               |
| ancestors   | An array of ancestors for the remove cascade operation. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

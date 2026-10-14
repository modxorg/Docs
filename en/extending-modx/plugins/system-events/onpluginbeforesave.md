---
title: "OnPluginBeforeSave"
description: "Fires right before a Plugin is saved."
_old_id: "443"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginbeforesave"
---

## Event: OnPluginBeforeSave

Fires right before a Plugin is saved.

- Service: 1 - Parser Service Events
- Group: Plugins

## Event Parameters

| Name      | Description                                                        |
| --------- | ------------------------------------------------------------------ |
| mode      | Either 'new' or 'upd', depending on the circumstance.              |
| plugin    | A reference to the modPlugin object.                               |
| cacheFlag | The cache flag passed to the save operation.                       |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

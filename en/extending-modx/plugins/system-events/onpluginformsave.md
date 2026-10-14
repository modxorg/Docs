---
title: "OnPluginFormSave"
description: "Fires after a Plugin is saved in the manager."
_old_id: "448"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformsave"
---

## Event: OnPluginFormSave

Fires after a Plugin is saved in the manager.

- Service: 1 - Parser Service Events
- Group: Plugins

## Event Parameters

| Name   | Description                                                         |
| ------ | ------------------------------------------------------------------- |
| mode   | Either 'new' or 'upd', depending on the circumstance.               |
| id     | The ID of the Plugin.                                               |
| plugin | A reference to the modPlugin object.                                |
| object | A reference to the modPlugin object, the same instance as `plugin`. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

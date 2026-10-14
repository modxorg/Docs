---
title: "OnPluginFormDelete"
description: "Fires after a plugin is deleted in the manager."
_old_id: "445"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformdelete"
---

## Event: OnPluginFormDelete

Fires after a Plugin is deleted.

- Service: 1 - Parser Service Events
- Group: Plugins

## Event Parameters

| Name   | Description                                                         |
| ------ | ------------------------------------------------------------------- |
| id     | The ID of the Plugin.                                               |
| plugin | A reference to the modPlugin object.                                |
| object | A reference to the modPlugin object, the same instance as `plugin`. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

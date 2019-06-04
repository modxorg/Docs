---
title: "OnPluginFormSave"
_old_id: "448"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformsave"
---

## Event: OnPluginFormSave

Fires after a Plugin is saved in the manager.

Service: 1 - Parser Service Events
Group: Plugins

## Event Parameters

| Name  | Description                                           |
| ----- | ----------------------------------------------------- |
| mode  | Either 'upd' or 'new', depending on the circumstance. |
| chunk | A reference to the modPlugin object.                  |
| id    | The ID of the plugin.                                 |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

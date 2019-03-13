---
title: "OnPluginFormRender"
_old_id: "447"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformrender"
---

## Event: OnPluginFormRender

Fires during the rendering of a form. Useful for rendering HTML straight into the Plugin form.

Service: 1 - Parser Service Events 
Group: Plugins

## Event Parameters

| Name  | Description                                                       |
| ----- | ----------------------------------------------------------------- |
| mode  | Either 'new' or 'upd', depending on the circumstance.             |
| id    | The ID of the Plugin. This will be 0 for new plugins.             |
| chunk | A reference to the modPlugin object. Will be null in new plugins. |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
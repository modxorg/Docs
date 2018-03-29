---
title: "OnPluginFormPrerender"
_old_id: "446"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformprerender"
---

## Event: OnPluginFormPrerender

Occurs before the plugin modification form is rendered, but after the JS is registered. Can be used to render custom Javascript for the mgr.

Service: 1 - Parser Service Events 
Group: Plugins

## Event Parameters

| Name | Description |
|------|-------------|
| mode | Either 'new' or 'upd', depending on the circumstance. |
| id | The ID of the Plugin. Will be 0 for new plugins. |
| plugin | A reference to the modPlugin object. Will be null in new plugins. |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
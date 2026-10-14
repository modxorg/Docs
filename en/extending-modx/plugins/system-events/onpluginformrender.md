---
title: "OnPluginFormRender"
description: "Fires during the rendering of the Plugin form."
_old_id: "447"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformrender"
---

## Event: OnPluginFormRender

Fires during the rendering of the Plugin form. Useful for inserting HTML straight into the form.

- Service: 1 - Parser Service Events
- Group: Plugins

## Event Parameters

| Name   | Description                                                      |
| ------ | ---------------------------------------------------------------- |
| mode   | Either 'new' or 'upd', depending on the circumstance.            |
| id     | The ID of the Plugin. This will be 0 for new Plugins.            |
| plugin | A reference to the modPlugin object. Not passed for new Plugins. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

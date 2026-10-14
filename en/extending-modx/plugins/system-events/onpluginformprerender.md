---
title: "OnPluginFormPrerender"
description: "Fires before the Plugin modification form is rendered."
_old_id: "446"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformprerender"
---

## Event: OnPluginFormPrerender

Fires before the Plugin modification form is rendered, but after the JS is registered. Can be used to render custom JavaScript for the manager.

- Service: 1 - Parser Service Events
- Group: Plugins

## Event Parameters

| Name   | Description                                                     |
| ------ | --------------------------------------------------------------- |
| mode   | Either 'new' or 'upd', depending on the circumstance.           |
| id     | The ID of the Plugin. Will be 0 for new Plugins.                |
| plugin | A reference to the modPlugin object. Not passed for new Plugins. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

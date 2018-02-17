---
title: "OnBeforePluginFormSave"
_old_id: "387"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforepluginformsave"
---

## Event: OnBeforePluginFormSave

Fires after a form is submitted but before a Plugin is saved in the manager.

Service: 1 - Parser Service Events 
Group: Plugin

## Event Parameters

NameDescriptionmodeEither 'upd' or 'new', depending on the circumstance.pluginA reference to the modPlugin object.idThe ID of the plugin. Will be 0 for new plugins.## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
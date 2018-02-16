---
title: "OnBeforePluginFormSave"
_old_id: "387"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforepluginformsave"
---

Event: OnBeforePluginFormSave
-----------------------------

Fires after a form is submitted but before a Plugin is saved in the manager.

Service: 1 - Parser Service Events   
Group: Plugin

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'upd' or 'new', depending on the circumstance.</td></tr><tr><td>plugin</td><td>A reference to the modPlugin object.</td></tr><tr><td>id</td><td>The ID of the plugin. Will be 0 for new plugins.</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
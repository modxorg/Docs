---
title: "OnPluginFormSave"
_old_id: "448"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformsave"
---

Event: OnPluginFormSave
-----------------------

Fires after a Plugin is saved in the manager.

Service: 1 - Parser Service Events   
Group: Plugins

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'upd' or 'new', depending on the circumstance.</td></tr><tr><td>chunk</td><td>A reference to the modPlugin object.</td></tr><tr><td>id</td><td>The ID of the plugin.</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")
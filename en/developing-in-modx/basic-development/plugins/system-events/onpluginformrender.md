---
title: "OnPluginFormRender"
_old_id: "447"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformrender"
---

Event: OnPluginFormRender
-------------------------

Fires during the rendering of a form. Useful for rendering HTML straight into the Plugin form.

Service: 1 - Parser Service Events   
Group: Plugins

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'new' or 'upd', depending on the circumstance.</td></tr><tr><td>id</td><td>The ID of the Plugin. This will be 0 for new plugins.</td></tr><tr><td>chunk</td><td>A reference to the modPlugin object. Will be null in new plugins.</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
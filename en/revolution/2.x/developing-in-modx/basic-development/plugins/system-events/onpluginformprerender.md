---
title: "OnPluginFormPrerender"
_old_id: "446"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginformprerender"
---

Event: OnPluginFormPrerender
----------------------------

Occurs before the plugin modification form is rendered, but after the JS is registered. Can be used to render custom Javascript for the mgr.

Service: 1 - Parser Service Events   
Group: Plugins

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'new' or 'upd', depending on the circumstance.</td></tr><tr><td>id</td><td>The ID of the Plugin. Will be 0 for new plugins.</td></tr><tr><td>plugin</td><td>A reference to the modPlugin object. Will be null in new plugins.</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")
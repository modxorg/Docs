---
title: "OnBeforeTempFormSave"
_old_id: "392"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetempformsave"
---

Event: OnBeforeTempFormSave
---------------------------

Fires after a form is submitted but before a Template is saved in the manager.

Service: 1 - Parser Service Events   
Group: Templates

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'upd' or 'new', depending on the circumstance.</td></tr><tr><td>template</td><td>A reference to the modTemplate object.</td></tr><tr><td>id</td><td>The ID of the Template. Will be 0 for new Templates.</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
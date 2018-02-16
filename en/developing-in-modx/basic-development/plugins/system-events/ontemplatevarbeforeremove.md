---
title: "OnTemplateVarBeforeRemove"
_old_id: "464"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforeremove"
---

Event: OnTemplateVarBeforeRemove
--------------------------------

Loaded right before removing a template variable.

Service: 1 - Parser Service Events   
Group: Template Variables

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>templateVar</td><td>The instance of modTemplateVar class.</td></tr><tr><td>cacheFlag</td><td>Indicates if the saved TV should be cached and optionally, by specifying an integer value, for how many seconds before expiring. Returns always 'true'</td></tr></tbody></table>Remarks
-------

<table><tbody><tr><th>Previous event</th><td>—</td></tr><tr><th>Next event</th><td>[OnTemplateVarRemove](developing-in-modx/basic-development/plugins/system-events/ontemplatevarremove "OnTemplateVarRemove")</td></tr><tr><th>File</th><td>[core/model/modx/modtemplatevar.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modtemplatevar.class.php)</td></tr><tr><th>Class</th><td>modTemplateVar</td></tr><tr><th>Method</th><td>public function remove(array $ancestors= array ())</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
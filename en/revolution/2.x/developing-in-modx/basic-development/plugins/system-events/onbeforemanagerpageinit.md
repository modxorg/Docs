---
title: "OnBeforeManagerPageInit"
_old_id: "385"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit"
---

Event: OnBeforeManagerPageInit
------------------------------

Loaded right before a manager controller is run and after checking permissions.

Service: 2 - Manager Access Events   
Group: System

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>action</td><td>The config array of current manager controller.</td></tr><tr><td>filename</td><td>The filename of the controller being loaded. (**Deprecated since 2.2**)</td></tr></tbody></table>Remarks
-------

<table><tbody><tr><th>Previous event</th><td>[OnManagerPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit "OnManagerPageInit")</td></tr><tr><th>Next event</th><td>[OnManagerPageBeforeRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")</td></tr><tr><th>File</th><td>[core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php)</td></tr><tr><th>Class</th><td>abstract class modManagerController</td></tr><tr><th>Method</th><td>public function render()</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")
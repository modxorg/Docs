---
title: "OnManagerPageBeforeRender"
_old_id: "437"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender"
---

Event: OnManagerPageBeforeRender
--------------------------------

Fired in the manager controller, before the processing of content.

Service: 2 - Manager Access Events   
Group: System

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>controller</td><td>The instance of current manager page's controller.</td></tr></tbody></table>Remarks
-------

<table><tbody><tr><th>Previous event</th><td>[OnBeforeManagerPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")</td></tr><tr><th>Next event</th><td>[OnManagerPageAfterRender](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender "OnManagerPageAfterRender")</td></tr><tr><th>File</th><td>[core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php)</td></tr><tr><th>Class</th><td>abstract class modManagerController</td></tr><tr><th>Method</th><td>public function render()</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")
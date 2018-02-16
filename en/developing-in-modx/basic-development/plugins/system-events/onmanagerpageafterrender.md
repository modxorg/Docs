---
title: "OnManagerPageAfterRender"
_old_id: "436"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender"
---

Event: OnManagerPageAfterRender
-------------------------------

Fired in the manager controller, after the processing of content and before returning it. The last event before getting response.

Service: 2 - Manager Access Events   
Group: System

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>controller</td><td>The instance of current manager page's controller.</td></tr></tbody></table>Remarks
-------

<table><tbody><tr><th>Previous event</th><td>[OnManagerPageBeforeRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")</td></tr><tr><th>Next event</th><td>—</td></tr><tr><th>File</th><td>[core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php)</td></tr><tr><th>Class</th><td>abstract class modManagerController</td></tr><tr><th>Method</th><td>public function render()</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
---
title: "OnManagerPageInit"
_old_id: "438"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit"
---

Event: OnManagerPageInit
------------------------

Fired in the manager request handler, before the manager page response is loaded and after defining request action.

Service: 2 - Manager Access Events   
Group: System

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>action</td><td>The ID of the action currently being loaded.</td></tr></tbody></table>Remarks
-------

<table><tbody><tr><th>Previous event</th><td>[OnHandleRequest](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onhandlerequest "OnHandleRequest")</td></tr><tr><th>Next event</th><td>[OnBeforeManagerPageInit](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")</td></tr><tr><th>File</th><td>[core/model/modx/modmanagerrequest.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagerrequest.class.php)</td></tr><tr><th>Class</th><td>class modManagerRequest</td></tr><tr><th>Method</th><td>public function handleRequest()</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")
---
title: "OnHandleRequest"
_old_id: "427"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onhandlerequest"
---

Event: OnHandleRequest 
-----------------------

Fires at the beginning of a request handler.

Service: 5 - Template Service Events   
Group: System

Event Parameters 
-----------------

**None.**

Output 
-------

Anything returned by this event will be written to the logs as an error.

Remarks 
--------

<table><tbody><tr><th>Previous event </th><td>— </td></tr><tr><th>Next event </th><td>[OnManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit "OnManagerPageInit") or [OnWebPageInit](/display/revolution20/OnWebPageInit "OnWebPageInit") (depending on context) </td></tr><tr><th>File </th><td>[core/model/modx/modmanagerrequest.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagerrequest.class.php)</td></tr><tr><th>Class </th><td>class modManagerRequest </td></tr><tr><th>Method </th><td>public function handleRequest() </td></tr></tbody></table>See Also 
---------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
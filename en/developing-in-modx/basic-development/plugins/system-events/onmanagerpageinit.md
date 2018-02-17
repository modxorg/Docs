---
title: "OnManagerPageInit"
_old_id: "438"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit"
---

## Event: OnManagerPageInit

Fired in the manager request handler, before the manager page response is loaded and after defining request action.

Service: 2 - Manager Access Events 
Group: System

## Event Parameters

NameDescriptionactionThe ID of the action currently being loaded.## Remarks

Previous event[OnHandleRequest](developing-in-modx/basic-development/plugins/system-events/onhandlerequest "OnHandleRequest")Next event[OnBeforeManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")File[core/model/modx/modmanagerrequest.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagerrequest.class.php)Classclass modManagerRequestMethodpublic function handleRequest()## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
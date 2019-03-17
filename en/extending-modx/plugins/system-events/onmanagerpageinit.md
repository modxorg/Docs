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

| Name   | Description                                  |
| ------ | -------------------------------------------- |
| action | The ID of the action currently being loaded. |

## Remarks

| Previous event | [OnHandleRequest](developing-in-modx/basic-development/plugins/system-events/onhandlerequest "OnHandleRequest")                              |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnBeforeManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")      |
| File           | [core/model/modx/modmanagerrequest.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagerrequest.class.php) |
| Class          | class modManagerRequest                                                                                                                      |
| Method         | public function handleRequest()                                                                                                              |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
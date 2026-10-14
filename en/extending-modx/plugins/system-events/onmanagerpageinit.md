---
title: "OnManagerPageInit"
description: "Fires in the manager request handler after the request action is defined and before the manager page is loaded."
_old_id: "438"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit"
---

## Event: OnManagerPageInit

Fires in the manager request handler after the request action is defined and before the manager page loads.

- Service: 2 - Manager Access Events
- Group: System

## Event Parameters

| Name      | Description                                                                     |
| --------- | ------------------------------------------------------------------------------- |
| action    | The ID of the action being loaded.                                                         |
| namespace | Namespace key of that action. Defaults to `core`.                                          |

## Remarks

| Previous event | [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest "OnHandleRequest")                                                    |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")                            |
| File           | [core/src/Revolution/modManagerRequest.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerRequest.php) |
| Class          | class modManagerRequest                                                                                                                      |
| Method         | public function handleRequest()                                                                                                              |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

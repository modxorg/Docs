---
title: "OnHandleRequest"
description: "Fires at the beginning of the request handler, in both the web and manager contexts."
_old_id: "427"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onhandlerequest"
---

## Event: OnHandleRequest

Fires at the beginning of a request handler, in both the web and manager contexts.

- Service: 5 - Template Service Events
- Group: System

## Event Parameters

**None.**

## Return Values

Values returned from this event are written to the log as errors.

## Remarks

| Previous event | —                                                                                                                                                                                                             |
| -------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit "OnManagerPageInit") or [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit "OnWebPageInit") (depending on context) |
| File           | [core/src/Revolution/modManagerRequest.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerRequest.php)                                                                         |
| Class          | class modManagerRequest                                                                                                                                                                                       |
| Method         | public function handleRequest()                                                                                                                                                                               |

::: tip Note
On the web side the event is fired from [modRequest::handleRequest()](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modRequest.php); in the manager it is fired from the class and method listed above.
:::


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

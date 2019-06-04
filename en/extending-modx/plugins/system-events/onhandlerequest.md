---
title: "OnHandleRequest"
_old_id: "427"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onhandlerequest"
---

## Event: OnHandleRequest

Fires at the beginning of a request handler.

Service: 5 - Template Service Events
Group: System

## Event Parameters

**None.**

## Output

Anything returned by this event will be written to the logs as an error.

## Remarks

| Previous event | —                                                                                                                                                                                                             |
| -------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit "OnManagerPageInit") or [OnWebPageInit](extending-modx/plugins/system-events/onwebpageinit "OnWebPageInit") (depending on context) |
| File           | [core/model/modx/modmanagerrequest.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagerrequest.class.php)                                                                  |
| Class          | class modManagerRequest                                                                                                                                                                                       |
| Method         | public function handleRequest()                                                                                                                                                                               |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

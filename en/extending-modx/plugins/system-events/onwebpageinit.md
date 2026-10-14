---
title: "OnWebPageInit"
description: "Fires during the initialization of a web Resource request, after modX::beforeRequest() and before the Resource is loaded."
_old_id: "481"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onwebpageinit"
---

## Event: OnWebPageInit

Fires during Resource request initialization: after [modX::beforeRequest()](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modX.php) and before the Resource is loaded, the unauthorized page checks run, or a response is sent. `modX::beforeRequest()` removes the `+username`, `+password`, `+dbname` and `+host` config placeholders.

With friendly URLs (`alias` mode), an unmatched alias already triggers the error page **before** this event. The main Resource load and the `sendErrorPage()`/`sendUnauthorizedPage()` checks happen **after** it.

- Service: 5 - Template Service Events
- Group: System


## Event Parameters

None.

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

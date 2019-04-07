---
title: "OnPageUnauthorized"
_old_id: "440"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpageunauthorized"
---

## Event: OnPageUnauthorized

Fires immediately before the user is forwarded to the unauthorized page if attempting to view a non-accessible Resource.

Service: 1 - Parser Service Events 
Group: None

## Event Parameters

| Name             | Description                                                        |
| ---------------- | ------------------------------------------------------------------ |
| response\_code   | The response code to send. Defaults to "HTTP/1.1 401 Unauthorized" |
| error\_type      | The type. Defaults to 401.                                         |
| error\_header    | The header being sent: Defaults to "HTTP/1.1 401 Unauthorized"     |
| error\_pagetitle | The pagetitle of the unauthorized page.                            |
| error\_message   | The message being sent in the unauthorized page.                   |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
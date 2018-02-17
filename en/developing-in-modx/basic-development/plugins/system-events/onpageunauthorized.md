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

NameDescriptionresponse\_codeThe response code to send. Defaults to "HTTP/1.1 401 Unauthorized"error\_typeThe type. Defaults to 401.error\_headerThe header being sent: Defaults to "HTTP/1.1 401 Unauthorized"error\_pagetitleThe pagetitle of the unauthorized page.error\_messageThe message being sent in the unauthorized page.## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
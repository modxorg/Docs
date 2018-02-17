---
title: "OnPageNotFound"
_old_id: "439"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpagenotfound"
---

## Event: OnPageNotFound

Fires immediately before the user is forwarded to the error page if attempting to view a non-existent Resource.

Service: 1 - Parser Service Events 
Group: None

## Event Parameters

NameDescriptionresponse\_codeThe response code to send. Defaults to "HTTP/1.1 404 Not Found"error\_typeThe type. Defaults to 404.error\_headerThe header being sent: Defaults to "HTTP/1.1 404 Not Found"error\_pagetitleThe pagetitle of the error page.error\_messageThe message being sent in the error page.## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
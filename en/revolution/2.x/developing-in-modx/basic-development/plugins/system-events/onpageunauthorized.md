---
title: "OnPageUnauthorized"
_old_id: "440"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpageunauthorized"
---

Event: OnPageUnauthorized
-------------------------

Fires immediately before the user is forwarded to the unauthorized page if attempting to view a non-accessible Resource.

Service: 1 - Parser Service Events   
Group: None

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>response\_code</td><td>The response code to send. Defaults to "HTTP/1.1 401 Unauthorized"</td></tr><tr><td>error\_type</td><td>The type. Defaults to 401.</td></tr><tr><td>error\_header</td><td>The header being sent: Defaults to "HTTP/1.1 401 Unauthorized"</td></tr><tr><td>error\_pagetitle</td><td>The pagetitle of the unauthorized page.</td></tr><tr><td>error\_message</td><td>The message being sent in the unauthorized page.</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")
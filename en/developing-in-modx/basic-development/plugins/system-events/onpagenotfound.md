---
title: "OnPageNotFound"
_old_id: "439"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpagenotfound"
---

Event: OnPageNotFound
---------------------

Fires immediately before the user is forwarded to the error page if attempting to view a non-existent Resource.

Service: 1 - Parser Service Events   
Group: None

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>response\_code</td><td>The response code to send. Defaults to "HTTP/1.1 404 Not Found"</td></tr><tr><td>error\_type</td><td>The type. Defaults to 404.</td></tr><tr><td>error\_header</td><td>The header being sent: Defaults to "HTTP/1.1 404 Not Found"</td></tr><tr><td>error\_pagetitle</td><td>The pagetitle of the error page.</td></tr><tr><td>error\_message</td><td>The message being sent in the error page.</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
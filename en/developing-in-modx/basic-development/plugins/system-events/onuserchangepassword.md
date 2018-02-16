---
title: "OnUserChangePassword"
_old_id: "471"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuserchangepassword"
---

Event: OnUserChangePassword
---------------------------

Fires anytime the user properly changes their password.

Service: 3 - Template Service Events   
Group: None

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>user</td><td>A reference to the modUser object of the user.</td></tr><tr><td>newpassword</td><td>The new password being set.</td></tr><tr><td>oldpassword</td><td>The old password being overridden.</td></tr><tr><td>userid</td><td>The user ID of the user. (deprecated)</td></tr><tr><td>username</td><td>The username of the user. (deprecated)</td></tr><tr><td>userpassword</td><td>The new password being set. (deprecated)</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
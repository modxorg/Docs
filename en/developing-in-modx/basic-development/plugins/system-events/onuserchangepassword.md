---
title: "OnUserChangePassword"
_old_id: "471"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuserchangepassword"
---

## Event: OnUserChangePassword

Fires anytime the user properly changes their password.

Service: 3 - Template Service Events 
Group: None

## Event Parameters

| Name | Description |
|------|-------------|
| user | A reference to the modUser object of the user. |
| newpassword | The new password being set. |
| oldpassword | The old password being overridden. |
| userid | The user ID of the user. (deprecated) |
| username | The username of the user. (deprecated) |
| userpassword | The new password being set. (deprecated) |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
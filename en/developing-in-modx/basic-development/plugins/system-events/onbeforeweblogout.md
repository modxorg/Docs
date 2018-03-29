---
title: "OnBeforeWebLogout"
_old_id: "399"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout"
---

## Event: OnBeforeWebLogout

Fires right before a user logs out of a non-mgr context. The logout hasn't occured yet.

Service: 3 - Web Access Service Events 
Group: None

## Event Parameters

| Name | Description |
|------|-------------|
| **&** user | A reference to the modUser object of the user. **Passed by reference** |
| userid | The user ID of the user. (deprecated) |
| username | The username of the user. (deprecated) |
| **&** loginContext | The context key this logout is occurring in. **Passed by reference** |
| **&** addContexts | Additional contexts in which the logout is also occuring in. **Passed by reference** |

## See Also

- ?[OnBeforeManagerLogout event](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- ?[OnWebLogout event](developing-in-modx/basic-development/plugins/system-events/onweblogout "OnWebLogout")
- ??[OnManagerLogout event](developing-in-modx/basic-development/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
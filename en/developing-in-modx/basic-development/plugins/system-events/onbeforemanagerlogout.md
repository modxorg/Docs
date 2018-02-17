---
title: "OnBeforeManagerLogout"
_old_id: "384"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout"
---

## Event: OnBeforeManagerLogout

Fires before a user is logged out of the manager. The logout hasn't occured yet.

Service: 2 - Manager Access Service Events 
Group: None

## Event Parameters

NameDescription**&** userA reference to the modUser object of the user. **Passed by reference**useridThe user ID of the user. (deprecated)usernameThe username of the user. (deprecated)**&** loginContextThe context key this logout is occurring in. **Passed by reference****&** addContextsAdditional contexts in which the logout is also occuring in. **Passed by reference**## See Also

- ?[OnBeforeWebLogout event](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- ?[OnWebLogout event](developing-in-modx/basic-development/plugins/system-events/onweblogout "OnWebLogout")
- ??[OnManagerLogout event](developing-in-modx/basic-development/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
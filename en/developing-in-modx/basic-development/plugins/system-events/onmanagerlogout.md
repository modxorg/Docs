---
title: "OnManagerLogout"
_old_id: "435"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogout"
---

## Event: OnManagerLogout

Fires after a user is logged out of the manager and their context session is removed.

Service: 2 - Manager Access Service Events 
Group: None

## Event Parameters

NameDescription**&** userA reference to the modUser object of the user. **Passed by reference**useridThe user ID of the user. (deprecated)usernameThe username of the user. (deprecated)**&** loginContextThe context key this logout is occurring in. **Passed by reference****&** addContextsAdditional contexts in which the logout is also occuring in. **Passed by reference**## See Also

- ?[OnBeforeWebLogout event](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- ?[OnBeforeManagerLogout event](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- ?[OnWebLogout event](developing-in-modx/basic-development/plugins/system-events/onweblogout "OnWebLogout")
- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
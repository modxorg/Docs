---
title: "OnWebLogout"
_old_id: "479"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onweblogout"
---

## Event: OnWebLogout

Fires right after the user logs out of a context and their context session is removed.

Service: 3 - Web Access Service Events 
Group: None

## Event Parameters

NameDescription**&** userA reference to the modUser object of the user. **Passed by reference**useridThe user ID of the user. (deprecated)usernameThe username of the user. (deprecated)**&** loginContextThe context key this logout is occurring in. **Passed by reference****&** addContextsAdditional contexts in which the logout is also occuring in. **Passed by reference**## See Also

- ?[OnBeforeWebLogout event](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- ?[OnBeforeManagerLogout event](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- ??[OnManagerLogout event](developing-in-modx/basic-development/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
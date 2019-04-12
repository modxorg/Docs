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

| Name               | Description                                                                          |
| ------------------ | ------------------------------------------------------------------------------------ |
| **&** user         | A reference to the modUser object of the user. **Passed by reference**               |
| userid             | The user ID of the user. (deprecated)                                                |
| username           | The username of the user. (deprecated)                                               |
| **&** loginContext | The context key this logout is occurring in. **Passed by reference**                 |
| **&** addContexts  | Additional contexts in which the logout is also occuring in. **Passed by reference** |

## See Also

- [OnBeforeWebLogout event](extending-modx/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- [OnBeforeManagerLogout event](extending-modx/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- [OnWebLogout event](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnManagerLogout"
_old_id: "435"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogout"
---

Event: OnManagerLogout
----------------------

Fires after a user is logged out of the manager and their context session is removed.

Service: 2 - Manager Access Service Events   
Group: None

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>**&** user</td><td>A reference to the modUser object of the user. **Passed by reference**</td></tr><tr><td>userid</td><td>The user ID of the user. (deprecated)</td></tr><tr><td>username</td><td>The username of the user. (deprecated)</td></tr><tr><td>**&** loginContext</td><td>The context key this logout is occurring in. **Passed by reference**</td></tr><tr><td>**&** addContexts</td><td>Additional contexts in which the logout is also occuring in. **Passed by reference**</td></tr></tbody></table>See Also
--------

- ?[OnBeforeWebLogout event](developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- ?[OnBeforeManagerLogout event](developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- ?[OnWebLogout event](developing-in-modx/basic-development/plugins/system-events/onweblogout "OnWebLogout")
- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
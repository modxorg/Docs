---
title: "OnWebLogout"
_old_id: "479"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onweblogout"
---

Event: OnWebLogout
------------------

Fires right after the user logs out of a context and their context session is removed.

Service: 3 - Web Access Service Events   
Group: None

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>**&** user</td><td>A reference to the modUser object of the user. **Passed by reference**</td></tr><tr><td>userid</td><td>The user ID of the user. (deprecated)</td></tr><tr><td>username</td><td>The username of the user. (deprecated)</td></tr><tr><td>**&** loginContext</td><td>The context key this logout is occurring in. **Passed by reference**</td></tr><tr><td>**&** addContexts</td><td>Additional contexts in which the logout is also occuring in. **Passed by reference**</td></tr></tbody></table>See Also
--------

- ?[OnBeforeWebLogout event](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- ?[OnBeforeManagerLogout event](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- ??[OnManagerLogout event](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")
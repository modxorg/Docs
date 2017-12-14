---
title: "OnBeforeWebLogout"
_old_id: "399"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout"
---

Event: OnBeforeWebLogout
------------------------

Fires right before a user logs out of a non-mgr context. The logout hasn't occured yet.

Service: 3 - Web Access Service Events   
Group: None

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>**&** user</td><td>A reference to the modUser object of the user. **Passed by reference**</td></tr><tr><td>userid</td><td>The user ID of the user. (deprecated)</td></tr><tr><td>username</td><td>The username of the user. (deprecated)</td></tr><tr><td>**&** loginContext</td><td>The context key this logout is occurring in. **Passed by reference**</td></tr><tr><td>**&** addContexts</td><td>Additional contexts in which the logout is also occuring in. **Passed by reference**</td></tr></tbody></table>See Also
--------

- ?[OnBeforeManagerLogout event](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- ?[OnWebLogout event](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onweblogout "OnWebLogout")
- ??[OnManagerLogout event](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")
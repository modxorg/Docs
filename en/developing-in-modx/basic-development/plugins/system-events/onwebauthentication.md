---
title: "OnWebAuthentication"
_old_id: "477"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onwebauthentication"
---

Event: OnWebAuthentication
--------------------------

Fires right before the user is authenticated or its session is added for any non-manager context. This event can be used to provide external authentication support. This event is used to ALLOW login.

If its output is true, or an array where at least one index is set to true, then MODx will assume that the user has successfully logged in and bypass the default authentication via password.

Service: 3 - Web Access Events   
Group: None

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>**&** user</td><td>A reference to the modUser object. **Passed by reference**</td></tr><tr><td>password</td><td>The provided password.</td></tr><tr><td>rememberme</td><td>Whether or not to remember the user via cookie.</td></tr><tr><td>lifetime</td><td>The lifetime of the session cookie.</td></tr><tr><td>**&** loginContext</td><td>The context key this login is occurring in. **Passed by reference**</td></tr><tr><td>**&** addContexts</td><td>Additional contexts in which the login is also occuring in. **Passed by reference**</td></tr></tbody></table>Event Login Workflow
--------------------

1. _<ins>[_<ins>OnBeforeWebLogin</ins>_](http://rtfm.modx.com/display/revolution20/OnBeforeWebLogin)</ins>_ || _<ins>[OnBeforeManagerLogin](http://rtfm.modx.com/display/revolution20/OnBeforeManagerLogin)</ins>_ - Inside this event the developer can check for erroneous parameters which will **disallow** further logging in process. If plugins executed by this event return something except true, the logging in will be aborted with the specified error.
2. _<ins>[OnUserNotFound](http://rtfm.modx.com/display/revolution20/OnUserNotFound)</ins>_ - This event is executed only if the provided username is not found inside MODX database. The developer can provide it's own modUser object in the event output to continue the login process.
3. **_<ins>OnWebAuthentication</ins>_** || _<ins>[OnManagerAuthentication](http://rtfm.modx.com/display/revolution20/OnManagerAuthentication)</ins>_ - Inside this event the developer can check for parameters which will **override the default checking by password** and **allow** further logging in process. If one of the plugins executed from this event return true, the user is considered verified and logged in.
4. _<ins>[OnWebLogin](http://rtfm.modx.com/display/revolution20/OnWebLogin)</ins>_ || _<ins>[OnManagerLogin](http://rtfm.modx.com/display/revolution20/OnManagerLogin)</ins>_ - This event is fired after the logging in process has finished and the user is considered logged in. It **doesn't change** the logging in process **behaviour**.

See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
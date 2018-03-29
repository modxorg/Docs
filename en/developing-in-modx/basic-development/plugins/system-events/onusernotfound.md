---
title: "OnUserNotFound"
_old_id: "474"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onusernotfound"
---

## Event: OnUserNotFound

Fires when a user is not found during login.

Can be used to provide external authentication by returning an array, where one of the indexes in the array is an instance of (or extending) a modUser object.

Service: 6 - User Defined Events 
Group: modUser

## Event Parameters

| Name | Description |
|------|-------------|
| username | The specified username. |
| password | The specified password. |
| attributes | An array of: - rememberme - Boolean set if user wants password to be remembered.
- lifetime - The session cookie lifetime for this login.
- loginContext - The context key this login is occurring in.
- addContexts - Additional contexts in which the login is also occuring in. |

## Event Login Workflow

1. _[_OnBeforeWebLogin_](http://rtfm.modx.com/display/revolution20/OnBeforeWebLogin)_ || _[OnBeforeManagerLogin](http://rtfm.modx.com/display/revolution20/OnBeforeManagerLogin)_ - Inside this event the developer can check for erroneous parameters which will **disallow** further logging in process. If plugins executed by this event return something except true, the logging in will be aborted with the specified error.
2. **_OnUserNotFound_** - This event is executed only if the provided username is not found inside MODX database. The developer can provide it's own modUser object in the event output to continue the login process.
3. _[OnWebAuthentication](http://rtfm.modx.com/display/revolution20/OnWebAuthentication)_ || _[OnManagerAuthentication](http://rtfm.modx.com/display/revolution20/OnManagerAuthentication)_ - Inside this event the developer can check for parameters which will **override the default checking by password** and **allow** further logging in process. If one of the plugins executed from this event return true, the user is considered verified and logged in.
4. _[OnWebLogin](http://rtfm.modx.com/display/revolution20/OnWebLogin)_ || _[OnManagerLogin](http://rtfm.modx.com/display/revolution20/OnManagerLogin)_ - This event is fired after the logging in process has finished and the user is considered logged in. It **doesn't change** the logging in process **behaviour**.

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
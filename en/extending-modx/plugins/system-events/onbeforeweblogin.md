---
title: "OnBeforeWebLogin"
_old_id: "398"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeweblogin"
---

## Event: OnBeforeWebLogin

Fires before the login process is started for a user when logging in via a non-manager context. This event can be used to DENY the login process. By default it is denying the logging in.

To allow logging in when using this event please use:

``` php
$modx->event->output(true);
// before Revo 2.3.0 you should use instead:
$modx->event->_output = true;
```

- Service: 3 - Web Access Events
- Group: None

## Event Parameters

| Name       | Description                                                                                               |
| ---------- | --------------------------------------------------------------------------------------------------------- |
| username   | The provided username.                                                                                    |
| password   | The provided password.                                                                                    |
| attributes | An array of:                                                                                              |
|            | - **&** rememberme - Boolean set if user wants password to be remembered. **Passed by reference**         |
|            | - **&** lifetime - The session cookie lifetime for this login. **Passed by reference**                    |
|            | - **&** loginContext - The context key this login is occurring in. **Passed by reference**                |
|            | - **&** addContexts - Additional contexts in which the login is also occuring in. **Passed by reference** |

## Event Login Workflow

1. **_OnBeforeWebLogin_** || _[OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)_ - Inside this event the developer can check for erroneous parameters which will **disallow** further logging in process. If plugins executed by this event return something except true, the logging in will be aborted with the specified error.
2. _[OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)_ - This event is executed only if the provided username is not found inside MODX database. The developer can provide it's own modUser object in the event output to continue the login process.
3. _[OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)_ || _[OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)_ - Inside this event the developer can check for parameters which will **override the default checking by password** and **allow** further logging in process. If one of the plugins executed from this event return true, the user is considered verified and logged in.
4. _[OnWebLogin](extending-modx/plugins/system-events/onweblogin)_ || _[OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)_ - This event is fired after the logging in process has finished and the user is considered logged in. It **doesn't change** the logging in process **behaviour**.

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

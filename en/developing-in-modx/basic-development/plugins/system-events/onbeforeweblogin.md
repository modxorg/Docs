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

Service: 3 - Web Access Events 
Group: None

## Event Parameters

NameDescriptionusernameThe provided username.passwordThe provided password.attributesAn array of: - **&** rememberme - Boolean set if user wants password to be remembered. **Passed by reference**
- **&** lifetime - The session cookie lifetime for this login. **Passed by reference**
- **&** loginContext - The context key this login is occurring in. **Passed by reference**
- **&** addContexts - Additional contexts in which the login is also occuring in. **Passed by reference**

## Event Login Workflow

1. **_OnBeforeWebLogin_** || _[OnBeforeManagerLogin](http://rtfm.modx.com/display/revolution20/OnBeforeManagerLogin)_ - Inside this event the developer can check for erroneous parameters which will **disallow** further logging in process. If plugins executed by this event return something except true, the logging in will be aborted with the specified error.
2. _[OnUserNotFound](http://rtfm.modx.com/display/revolution20/OnUserNotFound)_ - This event is executed only if the provided username is not found inside MODX database. The developer can provide it's own modUser object in the event output to continue the login process.
3. _[OnWebAuthentication](http://rtfm.modx.com/display/revolution20/OnWebAuthentication)_ || _[OnManagerAuthentication](http://rtfm.modx.com/display/revolution20/OnManagerAuthentication)_ - Inside this event the developer can check for parameters which will **override the default checking by password** and **allow** further logging in process. If one of the plugins executed from this event return true, the user is considered verified and logged in.
4. _[OnWebLogin](http://rtfm.modx.com/display/revolution20/OnWebLogin)_ || _[OnManagerLogin](http://rtfm.modx.com/display/revolution20/OnManagerLogin)_ - This event is fired after the logging in process has finished and the user is considered logged in. It **doesn't change** the logging in process **behaviour**.

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
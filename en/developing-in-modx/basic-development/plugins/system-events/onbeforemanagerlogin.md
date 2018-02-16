---
title: "OnBeforeManagerLogin"
_old_id: "383"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogin"
---

Event: OnBeforeManagerLogin
---------------------------

Fires before the login process is started for a user when logging in to the manager context. This event can be used to DENY the login process. By default it is denying the logging in.

To allow logging in when using this event please use:

```
<pre class="brush: php">
$modx->event->output(true);
// before Revo 2.3.0 you should use instead:
$modx->event->_output = true;

```Service: 2 - Manager Access Events   
Group: None

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>username</td><td>The provided username.</td></tr><tr><td>password</td><td>The provided password.</td></tr><tr><td>attributes</td><td>An array of: - **&** rememberme - Boolean set if user wants password to be remembered. **Passed by reference**
- **&** lifetime - The session cookie lifetime for this login. **Passed by reference**
- **&** loginContext - The context key this login is occurring in. **Passed by reference**
- **&** addContexts - Additional contexts in which the login is also occuring in. **Passed by reference**

</td></tr></tbody></table>Event Login Workflow
--------------------

1. _<ins>[_<ins>OnBeforeWebLogin</ins>_](http://rtfm.modx.com/display/revolution20/OnBeforeWebLogin)</ins>_ || **_<ins>OnBeforeManagerLogin</ins>_** - Inside this event the developer can check for erroneous parameters which will **disallow** further logging in process. If plugins executed by this event return something except true, the logging in will be aborted with the specified error.
2. _<ins>[OnUserNotFound](http://rtfm.modx.com/display/revolution20/OnUserNotFound)</ins>_ - This event is executed only if the provided username is not found inside MODX database. The developer can provide it's own modUser object in the event output to continue the login process.
3. _<ins>[OnWebAuthentication](http://rtfm.modx.com/display/revolution20/OnWebAuthentication)</ins>_ || _<ins>[OnManagerAuthentication](http://rtfm.modx.com/display/revolution20/OnManagerAuthentication)</ins>_ - Inside this event the developer can check for parameters which will **override the default checking by password** and **allow** further logging in process. If one of the plugins executed from this event return true, the user is considered verified and logged in.
4. _<ins>[OnWebLogin](http://rtfm.modx.com/display/revolution20/OnWebLogin)</ins>_ || _<ins>[OnManagerLogin](http://rtfm.modx.com/display/revolution20/OnManagerLogin)</ins>_ - This event is fired after the logging in process has finished and the user is considered logged in. It **doesn't change** the logging in process **behaviour**.

See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
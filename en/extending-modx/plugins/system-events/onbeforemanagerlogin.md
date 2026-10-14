---
title: "OnBeforeManagerLogin"
description: "Fires before the login process starts for a user logging in to the manager context."
_old_id: "383"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogin"
---

## Event: OnBeforeManagerLogin

Fires before a user logs in to the Manager Context. By default the login continues. To deny it, the Plugin must set a non-empty event output other than `true`, usually an error message:

``` php
// block the login and pass the reason
$modx->event->output('Login is not allowed.');
```

The login aborts and shows that message. If no Plugin sets the output, or the output is `true`, the login proceeds. A value returned from Plugin code does not block the login; it goes to the error log.

- Service: 2 - Manager Access Events
- Group: Security

## Event Parameters

| Name       | Description                                                                                                |
| ---------- | ---------------------------------------------------------------------------------------------------------- |
| username   | The provided username.                                                                                     |
| password   | The provided password.                                                                                     |
| attributes | An array of:                                                                                               |
|            | - **&** rememberme - Boolean set if user wants password to be remembered. **Passed by reference**          |
|            | - **&** lifetime - The session cookie lifetime for this login. **Passed by reference**                     |
|            | - **&** loginContext - The context key this login is occurring in. **Passed by reference**                 |
|            | - **&** addContexts - Additional contexts in which the login is also occurring in. **Passed by reference** |

## Event Login Workflow

1. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin) || **OnBeforeManagerLogin** — block the login here (see above).
2. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound) — runs only if the username is not found in the MODX database. Provide your own `modUser` in the event output to continue the login.
3. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication) || [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication) — override the default password check here. A Plugin returning `true` marks the user as verified and logged in.
4. [OnWebLogin](extending-modx/plugins/system-events/onweblogin) || [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin) — fires after the login finishes; it does not change login behavior.


## Examples

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogin':
        $modx->log(modX::LOG_LEVEL_ERROR, 'A user with a name tried to log in '.$username.' and password '.$password.print_r($attributes, true));
        break;
}
```

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogin':
        if ($username == 'manager'){
            $user = $modx->getObject('modUser', array('username' => $username));
            $user->set('active', '0');
            $user->save();
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

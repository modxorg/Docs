---
title: "OnManagerLogin"
description: "Fires after a user successfully logs into the manager."
_old_id: "432"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogin"
---

## Event: OnManagerLogin

Fires after a user logs into the manager, once the authentication checks have passed. The event does not affect the authentication process.

- Service: 2 - Manager Access Events
- Group: Security

## Event Parameters

| Name       | Description                                                                      |
| ---------- | -------------------------------------------------------------------------------- |
| user       | The `modUser` that just logged in.                                               |
| attributes | An array with:                                                                  |
|            | - rememberme — whether the user asked to remember the login                     |
|            | - lifetime — session cookie lifetime for this login                             |
|            | - loginContext — context key for this login                                     |
|            | - addContexts — extra contexts that also received a session                     |

## Event Login Workflow

1. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin) || [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin) — a non-`true` output aborts the login with that message.
2. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound) — runs only when the username is missing from the MODX database. A Plugin may supply its own `modUser` to continue.
3. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication) || [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication) — overrides the default password check. A `true` output marks the user as verified and logged in.
4. [OnWebLogin](extending-modx/plugins/system-events/onweblogin) || **OnManagerLogin** — fires after the login has finished. It does **not change** the login outcome.

## Example

Log who logged in and with which attributes:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerLogin':
        $id = $user->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'User logged in with id '.$id.' '.print_r($attributes, true));
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

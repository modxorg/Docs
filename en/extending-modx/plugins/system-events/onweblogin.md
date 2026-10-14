---
title: "OnWebLogin"
description: "Fires after a user passes authentication for a non-`mgr` context and session contexts are added."
_old_id: "478"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onweblogin"
---

## Event: OnWebLogin

Fires after a user passes authentication for a non-`mgr` context and session contexts are added. Plugins cannot change whether the login succeeds.

- Service: 3 - Web Access Service Events
- Group: Security

## Event Parameters

| Name       | Description                                                                 |
| ---------- | --------------------------------------------------------------------------- |
| user       | The `modUser` that just logged in.                                          |
| attributes | An array with:                                                              |
|            | - rememberme — whether the user asked to remember the login                 |
|            | - lifetime — session cookie lifetime for this login                         |
|            | - loginContext — context key for this login                                 |
|            | - addContexts — extra contexts that also received a session                 |

## `$modx->getUser()` during OnWebLogin

The login processor adds session contexts **before** it invokes `OnWebLogin`. The user is logged in at the session level.

For web contexts it does **not** refresh `$modx->user` before the event. `$modx->getUser()` often still returns the previous request's user object (anonymous / id `0`, or whatever was cached). The call looks wrong here even though login succeeded.

Use the event `$user` parameter (or `$scriptProperties['user']`) for the authenticated user. If you need `$modx->getUser()` to match, clear and reload after the session exists:

```php
$modx->user = null;
$modx->getUser($attributes['loginContext'], true);
```

On a Manager login the processor does refresh `$modx->user` before [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin); the same refresh does not run for `OnWebLogin`.

## Event Login Workflow

1. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin) || [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin) — Plugins can abort login by returning a value other than `true`.
2. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound) — runs only when the username is missing from the MODX database. A Plugin may supply its own `modUser` to continue.
3. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication) || [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication) — Plugins can override the default password check. Returning `true` marks the user as authenticated.
4. **OnWebLogin** || [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin) — runs after session contexts are added. Does not change login success or failure.

## Example

Log who logged in and with which attributes:

```php
<?php
$eventName = $modx->event->name;
switch ($eventName) {
    case 'OnWebLogin':
        $name = $user->get('username');
        $modx->log(modX::LOG_LEVEL_ERROR, 'User logged in: ' . $name . ' ' . print_r($attributes, true));
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)
- [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)

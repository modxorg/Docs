---
title: "OnUserNotFound"
description: "Fires when a user is not found during login, allowing plugins to provide their own modUser."
_old_id: "474"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onusernotfound"
---

## Event: OnUserNotFound

Fires when a user is not found during login. Use it for external authentication.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name       | Description                                                                                      |
| ---------- | ------------------------------------------------------------------------------------------------ |
| user       | A reference to the modUser object, passed by reference. Return a `modUser` (or a class extending it) in the event output — directly or as one index of an array — or assign it here to continue the login. |
| username   | The specified username.                                                                          |
| password   | The specified password.                                                                          |
| attributes | An array with:                                                                                   |
|            | - rememberme — Boolean set if the user wants the password to be remembered                       |
|            | - lifetime — the session cookie lifetime for this login                                          |
|            | - loginContext — the context key this login is occurring in                                      |
|            | - addContexts — additional contexts in which the login is also occurring                         |

The `lifetime`, `loginContext` and `addContexts` values exist only inside the `attributes` array — they are not separate top-level parameters.

## Event Login Workflow

1. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin) || [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin) — a non-`true` output aborts the login with that message.
2. **OnUserNotFound** — runs only when the username is missing from the MODX database. A Plugin may supply its own `modUser` to continue.
3. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication) || [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication) — overrides the default password check. A `true` output marks the user as verified and logged in.
4. [OnWebLogin](extending-modx/plugins/system-events/onweblogin) || [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin) — fires after the login has finished. It does **not change** the login outcome.


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

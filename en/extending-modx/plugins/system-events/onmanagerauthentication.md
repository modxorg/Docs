---
title: "OnManagerAuthentication"
description: "Fires right before the manager user is authenticated; can be used to bypass the password check."
_old_id: "431"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerauthentication"
---

## Event: OnManagerAuthentication

Fires right before the user is authenticated or their session is added to the manager context. Use it to allow login without the password check.

If the output is `true`, MODX treats the user as logged in and skips the password check. An array counts as `true` if at least one of its indexes is `true`.

- Service: 2 - Manager Access Events
- Group: Security

## Event Parameters

| Name               | Description                                                                         |
| ------------------ | ----------------------------------------------------------------------------------- |
| **&** user         | A reference to the modUser object. **Passed by reference**                          |
| password           | The provided password.                                                              |
| rememberme         | Whether or not to remember the user via cookie.                                     |
| lifetime           | The lifetime of the session cookie.                                                 |
| **&** loginContext | The context key this login is occurring in. **Passed by reference**                 |
| **&** addContexts  | Additional contexts in which the login also occurs. **Passed by reference**                  |

## Event Login Workflow

1. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin) || [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin) — a non-`true` output aborts the login with that message.
2. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound) — runs only when the username is missing from the MODX database. A Plugin may supply its own `modUser` to continue.
3. [OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication) || **OnManagerAuthentication** — overrides the default password check. A `true` output marks the user as verified and logged in.
4. [OnWebLogin](extending-modx/plugins/system-events/onweblogin) || [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin) — fires after the login has finished. It does **not change** the login outcome.


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnWebAuthentication"
description: "Fires right before the user is authenticated or its session is added for any non-manager context."
_old_id: "477"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onwebauthentication"
---

## Event: OnWebAuthentication

Fires right before the user is authenticated or their session is added for any non-`mgr` context. Use it to allow login without the password check, for example in external authentication.

If the output is `true`, MODX treats the user as logged in and skips the password check. An array counts as `true` when at least one of its indexes is `true`.

- Service: 3 - Web Access Service Events
- Group: Security

## Event Parameters

| Name               | Description                                                                         |
| ------------------ | ----------------------------------------------------------------------------------- |
| **&** user         | A reference to the modUser object. **Passed by reference**                          |
| password           | The provided password.                                                              |
| rememberme         | Whether or not to remember the user via cookie.                                     |
| lifetime           | The lifetime of the session cookie.                                                 |
| **&** loginContext | The context key this login is occurring in. **Passed by reference**                 |
| **&** addContexts  | Additional contexts in which the login also occurs. **Passed by reference**         |

## Event Login Workflow

1. [OnBeforeWebLogin](extending-modx/plugins/system-events/onbeforeweblogin) || [OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin) — a non-`true` output aborts the login with that message.
2. [OnUserNotFound](extending-modx/plugins/system-events/onusernotfound) — runs only when the username is missing from the MODX database. A Plugin may supply its own `modUser` to continue.
3. **OnWebAuthentication** || [OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication) — overrides the default password check. A `true` output marks the user as verified and logged in.
4. [OnWebLogin](extending-modx/plugins/system-events/onweblogin) || [OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin) — fires after the login has finished. It does **not change** the login outcome.


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

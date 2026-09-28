---
title: "OnWebLogout"
_old_id: "479"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onweblogout"
---

## Event: OnWebLogout

Fires after the logout processor removes the user's session contexts for a non-`mgr` context. Plugins cannot change whether the logout already happened.

- Service: 3 - Web Access Events
- Group: None

## Event Parameters

| Name               | Description                                                                          |
| ------------------ | ------------------------------------------------------------------------------------ |
| **&** user         | A reference to the modUser object of the user. **Passed by reference**               |
| userid             | The user ID of the user. (deprecated)                                                |
| username           | The username of the user. (deprecated)                                               |
| **&** loginContext | The context key this logout is occurring in. **Passed by reference**                 |
| **&** addContexts  | Additional contexts in which the logout is also occuring in. **Passed by reference** |

## `$modx->getUser()` during OnWebLogout

The logout processor removes session contexts **before** it invokes `OnWebLogout`. For that context, `$modx->user->isAuthenticated($loginContext)` is already false.

It does **not** clear or reload `$modx->user` before the event. `$modx->getUser()` short-circuits on the cached object and still returns the user who just logged out (same id). Code that calls `$modx->getUser()` (or fires other plugins that do) can look "still logged in" even though the session context is gone.

Use the event `$user` parameter (or `$scriptProperties['user']`) for who logged out. Do not treat `$modx->getUser()` as the current session user during this event.

If you need `$modx->getUser()` to reflect a logged-out request state, clear and reload after the session contexts are gone:

```php
$modx->user = null;
$modx->getUser($loginContext, true);
```

The same processor path fires [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout) for `mgr`, also without refreshing `$modx->user`. Core tracking: [modxcms/revolution#17015](https://github.com/modxcms/revolution/issues/17015).

## Example

Log who logged out. Prefer the event `$user`, not `$modx->getUser()`:

```php
<?php
$eventName = $modx->event->name;
switch ($eventName) {
    case 'OnWebLogout':
        $id = $user->get('id');
        $modx->log(
            modX::LOG_LEVEL_ERROR,
            'User with id ' . $id . ' logged out of context ' . $loginContext
            . ' and these more ' . print_r($addContexts, true)
        );
        break;
}
```

## See Also

- [OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout)
- [OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout)
- [OnManagerLogout](extending-modx/plugins/system-events/onmanagerlogout)
- [OnWebLogin](extending-modx/plugins/system-events/onweblogin)
- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)

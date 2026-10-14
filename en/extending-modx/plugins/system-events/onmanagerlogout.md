---
title: "OnManagerLogout"
description: "Fires after a user is logged out of the manager and their context session is removed."
_old_id: "435"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerlogout"
---

## Event: OnManagerLogout

Fires after a user is logged out of the manager and their context session is removed.

- Service: 2 - Manager Access Events
- Group: Security

## Event Parameters

| Name               | Description                                                                          |
| ------------------ | ------------------------------------------------------------------------------------ |
| **&** user         | A reference to the modUser object of the user. **Passed by reference**               |
| userid             | The user ID of the user.                                                             |
| username           | The username of the user.                                                            |
| **&** loginContext | The context key this logout is occurring in. **Passed by reference**                 |
| **&** addContexts  | Additional contexts in which the logout also occurs. **Passed by reference**                  |

## `$modx->getUser()` during OnManagerLogout

Same logout processor as [OnWebLogout](extending-modx/plugins/system-events/onweblogout): session contexts are removed first, then the event fires, and `$modx->user` is not cleared. Use the event `$user`, not `$modx->getUser()`, for who logged out. OnWebLogout has the details and a reload workaround.

## Example

Log who logged out and from which context:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerLogout':
        $id = $user->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'User logged out with id '.$id.' out of context '.$loginContext.' and these more '.print_r($addContexts, true));
        break;
}
```

## See Also

- [OnBeforeWebLogout event](extending-modx/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- [OnBeforeManagerLogout event](extending-modx/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- [OnWebLogout event](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

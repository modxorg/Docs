---
title: "OnBeforeWebLogout"
description: "Fires right before a user logs out of a non-mgr context."
_old_id: "399"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeweblogout"
---

## Event: OnBeforeWebLogout

Fires right before a user logs out of a non-`mgr` Context.

- Service: 3 - Web Access Service Events
- Group: Security

## Event Parameters

| Name               | Description                                                                           |
| ------------------ | ------------------------------------------------------------------------------------- |
| **&** user         | A reference to the modUser object of the user. **Passed by reference**                |
| userid             | The user ID of the user. (deprecated)                                                 |
| username           | The username of the user. (deprecated)                                                |
| **&** loginContext | The context key this logout is occurring in. **Passed by reference**                  |
| **&** addContexts  | Additional contexts in which the logout is also occurring in. **Passed by reference** |

## Example

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeWebLogout':
        $u = $user->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'User with id '.$u.' logged out in context '.$loginContext.' and also in these'.print_r($addContexts, true));
        break;
}
```

## See Also

- [OnBeforeManagerLogout event](extending-modx/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- [OnWebLogout event](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [OnManagerLogout event](extending-modx/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

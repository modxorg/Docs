---
title: "OnWebLogout"
_old_id: "479"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onweblogout"
---

## Event: OnWebLogout

Fires right after the user logs out of a context and their context session is removed.

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

## Example

Such a plugin will display in the "Error log" who logged out and where:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnWebLogout':
        $id = $user->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'User with id logged out '.$id.' out of context '.$loginContext.' and these more '.print_r($addContexts));
        break;
}
```

## See Also

- [OnBeforeWebLogout event](extending-modx/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- [OnBeforeManagerLogout event](extending-modx/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- [OnManagerLogout event](extending-modx/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

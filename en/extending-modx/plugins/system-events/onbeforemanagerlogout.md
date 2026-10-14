---
title: "OnBeforeManagerLogout"
description: "Fires before a user is logged out of the manager."
_old_id: "384"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout"
---

## Event: OnBeforeManagerLogout

Fires before a user logs out of the Manager.

- Service: 2 - Manager Access Events
- Group: Security

## Event Parameters

| Name               | Description                                                                           |
| ------------------ | ------------------------------------------------------------------------------------- |
| **&** user         | A reference to the modUser object of the user. **Passed by reference**                |
| userid             | The user ID of the user. (deprecated)                                                 |
| username           | The username of the user. (deprecated)                                                |
| **&** loginContext | The context key this logout is occurring in. **Passed by reference**                  |
| **&** addContexts  | Additional contexts in which the logout is also occurring in. **Passed by reference** |

## Examples

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogout':
        $modx->log(modX::LOG_LEVEL_ERROR, 'User with id'.$user->get('id').' logged out in context '.$loginContext.' and also in these'.print_r($addContexts, true));
        break;
}
```

This Plugin blocks the logout when the user tries to leave the `mgr` Context:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogout':
        //if he tries to run away, we leave him
        if ($loginContext === 'mgr'){
            $response = array(
                'success' => false,
                'message' => "You can't go out! You are one of us .. one of us .. one of us",
                'data' => array(),
            );
            echo $modx->toJSON($response);
            exit;
        }
        break;
}
```

## See Also

- [OnBeforeWebLogout event](extending-modx/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- [OnWebLogout event](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [OnManagerLogout event](extending-modx/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

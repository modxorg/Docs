---
title: "OnBeforeManagerLogout"
_old_id: "384"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerlogout"
---

## Event: OnBeforeManagerLogout

Fires before a user is logged out of the manager. The logout hasn't occured yet.

- Service: 2 - Manager Access Events
- Group: None

## Event Parameters

| Name               | Description                                                                          |
| ------------------ | ------------------------------------------------------------------------------------ |
| user         | A reference to the modUser object of the user. **Passed by reference**               |
| userid             | The user ID of the user. (deprecated)                                                |
| username           | The username of the user. (deprecated)                                               |
| loginContext | The context key this logout is occurring in. **Passed by reference**                 |
| addContexts  | Additional contexts in which the logout is also occuring in. **Passed by reference** |

## Examples of

Such a plugin will write to the "Error log" the id of the logged out user and where he left from:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogout':
        $modx->log(modX::LOG_LEVEL_ERROR, 'User with id'.$user->get('id').' logged out in context '.$loginContext.' and also in these'.print_r($addContexts));
        break;
}
```
                
Such a plugin will display a message to the user that he cannot leave the context. `mgr`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogout':
        //if he tries to run away, we leave him
        if ($loginContext = 'mgr'){
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

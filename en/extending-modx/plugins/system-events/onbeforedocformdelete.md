---
title: "OnBeforeDocFormDelete"
description: "Fires before a Resource is deleted via the manager."
_old_id: "380"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformdelete"
---

## Event: OnBeforeDocFormDelete

Fires before a Resource is deleted in the Manager.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name     | Description                                                              |
| -------- | ------------------------------------------------------------------------ |
| resource | A reference to the modResource object.                                   |
| id       | The ID of the Resource.                                                  |
| children | An array of IDs of children of this resource which will also be deleted. |

## Examples

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeDocFormDelete':
        //if a id=7
        if ($id == 7){
            $modx->log(modX::LOG_LEVEL_ERROR, 'Someone tried to delete a resource '.$resource->get('pagetitle'));
            $response = array(
            	'success' => false,
            	'message' => "Can't be deleted! And then head off your shoulders!",
            	'data' => array(),
            );
            echo $modx->toJSON($response);
            exit;
        }
        break;
}
```

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeDocFormDelete':
        if (count($children) > 0) {
            $modx->log(modX::LOG_LEVEL_ERROR, 'A resource was deleted '.$resource->get('pagetitle').print_r($children, true));
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnBeforeDocFormDelete"
_old_id: "380"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformdelete"
---

## Event: OnBeforeDocFormDelete

Fires before a Resource is deleted via the manager.

- Service: 1 - Parser Service Events
- Group: Documents

## Event Parameters

| Name     | Description                                                              |
| -------- | ------------------------------------------------------------------------ |
| resource | A reference to the modResource object.                                   |
| id       | The ID of the Resource.                                                  |
| children | An array of IDs of children of this resource which will also be deleted. |

## Examples of

Such a plugin will display a message stating that a certain resource cannot be deleted, and will add an entry to the logs:

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
                
Such a plugin will write to the "Error log" the id of the remote resource and its children, if any:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeDocFormDelete':
        if (count($childrenIds) > 0) {
            $children = $childrenIds;
        }
        $modx->log(modX::LOG_LEVEL_ERROR, 'A resource was deleted '.$resource->get('pagetitle').print_r($children));
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

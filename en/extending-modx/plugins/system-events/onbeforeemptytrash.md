---
title: "OnBeforeEmptyTrash"
_old_id: "382"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeemptytrash"
---

## Event: OnBeforeEmptyTrash

Fires before the trash is emptied for the site.

- Service: 1 - Parser Service Events
- Group: Documents

## Event Parameters

| Name | Description                                                |
| ---- | ---------------------------------------------------------- |
| ids  | An array of Resource IDs that will be permanently deleted. |

## Examples of

Such a plugin will display the id of remote resources in the "Error log":

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeEmptyTrash':
        // remote resource array
        print_r($ids);
        break;
}
```
                
Such a plugin will display a message stating that there is an important document in the shopping cart and it cannot be deleted:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeEmptyTrash':
        // if there is a document with id = 26, then do not delete
        if (in_array("26", $ids)){
            $response = array(
            	'success' => false,
            	'message' => 'HEY! There is a document that cannot be deleted!',
            	'data' => array(),
            );
            echo $modx->toJSON($response);
            exit;
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

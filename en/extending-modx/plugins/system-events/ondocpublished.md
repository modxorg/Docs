---
title: "OnDocPublished"
_old_id: "423"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocpublished"
---

## Event: OnDocPublished

Called when a Resource is published via the Publish context menu.

- Service: 5 - Template Service Events
- Group: None

## Event Parameters

| Name     | Description                                            |
| -------- | ------------------------------------------------------ |
| docid    | The ID of the resource being published. (deprecated)   |
| id       | The ID of the resource being published.                |
| resource | A reference to the modResource object being published. |

## Important! Before using this event, you need to know

The event fires only when a resource is published via the document context menu in the resource tree. If you check the published checkbox while editing a document on the page of the document itself, nothing happens.

## Example

Such a plugin will display an array of the published resource in the "Error log", and a success message on the screen:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocPublished':
        $response = array(
        	'success' => false,
        	'message' => 'The publication was successful!',
        	'data' => array(),
        );
        echo $modx->toJSON($response);
        exit; 
        $modx->log(modX::LOG_LEVEL_ERROR, print_r($resource->toArray(),true));
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

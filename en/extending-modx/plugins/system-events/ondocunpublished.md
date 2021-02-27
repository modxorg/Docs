---
title: "OnDocUnPublished"
_old_id: "424"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocunpublished"
---

## Event: OnDocUnPublished

Called when a Resource is unpublished via the Unpublish context menu.

- Service: 5 - Template Service Events
- Group: None

## Event Parameters

| Name     | Description                                              |
| -------- | -------------------------------------------------------- |
| docid    | The ID of the resource being unpublished. (deprecated)   |
| id       | The ID of the resource being unpublished.                |
| resource | A reference to the modResource object being unpublished. |

## Important! Before using this event, you need to know

The event fires only when the resource is unpublished via the document context menu in the resource tree. If you uncheck the published checkbox while editing a document on the document page itself, nothing happens.

## Example

Such a plugin will display an array of the unpublished resource in the "Error log", and a success message on the screen:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocUnPublished':
        $response = array(
        	'success' => false,
        	'message' => 'Resource removed from publication!',
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

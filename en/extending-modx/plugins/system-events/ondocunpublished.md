---
title: "OnDocUnPublished"
description: "Fires when a Resource is unpublished via the Unpublish context menu."
---

## Event: OnDocUnPublished

Fires when a Resource is unpublished via the Unpublish context menu, from the `Resource\Unpublish` processor. Unchecking the Published box while editing the Resource does not fire it.

- Service: 5 - Template Service Events
- Group: Resources

## Event Parameters

| Name     | Description                                              |
| -------- | -------------------------------------------------------- |
| docid    | The ID of the Resource being unpublished. (deprecated)   |
| id       | The ID of the Resource being unpublished.                |
| resource | A reference to the modResource object being unpublished. |

## Example

This plugin logs the unpublication to the error log. The response of this event is not processed by the processor — it cannot cancel or change the unpublication:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocUnPublished':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Resource '.$id.' was unpublished');
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

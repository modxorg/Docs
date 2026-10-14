---
title: "OnDocPublished"
description: "Fires when a Resource is published via the Publish context menu."
---

## Event: OnDocPublished

Fires when a Resource is published via the Publish context menu, from the `Resource\Publish` processor. Checking the Published box while editing the Resource does not fire it.

- Service: 5 - Template Service Events
- Group: Resources

## Event Parameters

| Name     | Description                                            |
| -------- | ------------------------------------------------------ |
| docid    | The ID of the Resource being published. (deprecated)   |
| id       | The ID of the Resource being published.                |
| resource | A reference to the modResource object being published. |

## Example

This plugin logs the publication to the error log. The response of this event is not processed by the processor — it cannot cancel or change the publication:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnDocPublished':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Resource '.$id.' was published');
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

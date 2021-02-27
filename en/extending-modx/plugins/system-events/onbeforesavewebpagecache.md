---
title: "OnBeforeSaveWebPageCache"
_old_id: "388"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesavewebpagecache"
---

## Event: OnBeforeSaveWebPageCache

Fired after the Resource is loaded and before the Resource is cached. If the Resource is not cacheable, this event will not fire.

- Service: 4 - Cache Service Events 
- Group: None

## Event Parameters

None. The resource can be referenced via $modx->resource.

## Example

Such a plugin will write to the "Error log" id of the loaded resource:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeSaveWebPageCache':
        $res = $modx->resource->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'Resource with id '.$res.' booted successfully');
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

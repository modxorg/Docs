---
title: "OnBeforeSaveWebPageCache"
description: "Fires before a cacheable Resource page is written to the cache."
_old_id: "388"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforesavewebpagecache"
---

## Event: OnBeforeSaveWebPageCache

Fires after the Resource loads and before it is cached. The event only runs when the page was generated successfully. It also requires the `cache_resource` system setting (default `1`) and `cacheable = 1` on the Resource. Otherwise nothing is written to the cache and the event does not run.

- Service: 4 - Cache Service Events
- Group: System

## Event Parameters

None. The Resource is available as `$modx->resource`.

## Example

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

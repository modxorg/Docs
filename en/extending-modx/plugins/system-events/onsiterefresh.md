---
title: "OnSiteRefresh"
_old_id: "462"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onsiterefresh"
---

## Event: OnSiteRefresh

Fires after the cache for the entire site is cleared.

- Service: 1 - Parser Service Events
- Group: None

## Event Parameters

| Name    | Description          |
| ------- | -------------------- |
| results | An array of results. |

## Example

Such a plugin displays an array of what has been cleared to the console:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnSiteRefresh':
        $modx->log(modX::LOG_LEVEL_ERROR, 'The cache is cleared '.print_r($partitions));
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

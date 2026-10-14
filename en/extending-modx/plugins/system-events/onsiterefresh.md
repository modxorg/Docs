---
title: "OnSiteRefresh"
description: "Fires after the cache for the entire site is cleared."
_old_id: "462"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onsiterefresh"
---

## Event: OnSiteRefresh

Fires after the cache for the entire site is cleared.

- Service: 1 - Parser Service Events
- Group: System

## Event Parameters

| Name       | Description                                                                                                                                                    |
| ---------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| results    | An array of results of the cache refresh.                                                                                                                      |
| partitions | An array of refreshed cache partitions. Passed only from the Clear Cache processor; from the `system/refresh_site` controller the event has **no parameters**. |

## Example

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnSiteRefresh':
        $modx->log(modX::LOG_LEVEL_ERROR, 'The cache is cleared '.print_r($partitions, true));
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnCacheUpdate"
description: "Fires after the site cache is cleared."
---

## Event: OnCacheUpdate

Fires after the site cache is cleared, in `modCacheManager::clean()` and `modCacheManager::refresh()`.

- Service: 4 - Cache Service Events
- Group: System

## Event Parameters

| Name    | Description                                              |
| ------- | -------------------------------------------------------- |
| results | The results of the clearing.                             |
| paths   | An array of paths that were to be cleared.               |
| options | An array of options passed to the cache clearing method. |

## Example

```php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnCacheUpdate':
        $modx->log(modX::LOG_LEVEL_ERROR, print_r($results, true));
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnCacheUpdate"
_old_id: "400"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/oncacheupdate"
---

## Event: OnCacheUpdate

Fired after the cache is cleared at any time.

- Service: 4 - Cache Service Events
- Group: None

## Event Parameters

| Name    | Description                                              |
| ------- | -------------------------------------------------------- |
| results | The results of the clearing.                             |
| paths   | An array of paths that were to be cleared.               |
| options | An array of options passed to the cache clearing method. |

## Example

Such a plugin will display and write the result of execution to the "Error log":

```php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnCacheUpdate':
        $modx->log(modX::LOG_LEVEL_ERROR, print_r($results));
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

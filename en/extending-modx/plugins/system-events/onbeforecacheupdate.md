---
title: "OnBeforeCacheUpdate"
_old_id: "377"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforecacheupdate"
---

## Event: OnBeforeCacheUpdate

Fired before the entire site cache is cleared.

- Service: 4 - Cache Service Events
- Group: None

## Event Parameters

None.

## Example

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeCacheUpdate':
        $modx->log(modX::LOG_LEVEL_ERROR, "Let's start!");
        break;
}
```

Now refresh the cache and you will see "Let's start!"

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

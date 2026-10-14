---
title: "OnBeforeCacheUpdate"
description: "Fires before the site cache is cleared."
_old_id: "377"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforecacheupdate"
---

## Event: OnBeforeCacheUpdate

Fires before the entire site cache is cleared.

- Service: 4 - Cache Service Events
- Group: System

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

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

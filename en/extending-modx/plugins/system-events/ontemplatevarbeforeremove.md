---
title: "OnTemplateVarBeforeRemove"
description: "Fires right before a TV is removed, in modTemplateVar::remove()."
_old_id: "464"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforeremove"
---

## Event: OnTemplateVarBeforeRemove

Fires right before a TV is removed, in `modTemplateVar::remove()`.

- Service: 1 - Parser Service Events
- Group: Template Variables

## Event Parameters

| Name        | Description                                                                            |
| ----------- | -------------------------------------------------------------------------------------- |
| templateVar | A reference to the modTemplateVar object.                                              |
| cacheFlag   | Always `true` — the core passes a hard-coded flag when firing this event.                             |

## Remarks

| Next event | [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove "OnTemplateVarRemove") |
| ---------- | ----------------------------------------------------------------------------------------------------- |
| File       | [core/src/Revolution/modTemplateVar.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modTemplateVar.php) |
| Class      | MODX\Revolution\modTemplateVar                                                                         |
| Method     | `public function remove(array $ancestors = array())`                                                  |

## Example

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnTemplateVarBeforeRemove':
        //array tv, with all parameters
        print_r($templateVar->toArray());
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

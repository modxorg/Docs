---
title: "OnTemplateVarSave"
description: "Fires after a TV is saved, in modTemplateVar::save()."
_old_id: "467"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarsave"
---

## Event: OnTemplateVarSave

Fires after a TV is saved, in `modTemplateVar::save()`.

- Service: 1 - Parser Service Events
- Group: Template Variables

## Event Parameters

| Name        | Description                                                                               |
| ----------- | ----------------------------------------------------------------------------------------- |
| mode        | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`).                          |
| templateVar | A reference to the modTemplateVar object.                                                 |
| cacheFlag   | Whether the saved TV should be cached; optionally, an integer sets the expiry in seconds. |

## Remarks

| Previous event | [OnTemplateVarBeforeSave](extending-modx/plugins/system-events/ontemplatevarbeforesave "OnTemplateVarBeforeSave")               |
| -------------- | ------------------------------------------------------------------------------------------------------------------------------- |
| File           | [core/src/Revolution/modTemplateVar.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modTemplateVar.php) |
| Class          | MODX\Revolution\modTemplateVar                                                                                                  |
| Method         | `public function save($cacheFlag = null)`                                                                                       |

## Example

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnTemplateVarSave':
        //array tv, with all parameters
        print_r($templateVar->toArray());
        //checking for updating or creating the tv itself
        if ($mode == modSystemEvent::MODE_NEW){
            echo 'New TV has been saved';
        } elseif ($mode == modSystemEvent::MODE_UPD){
            echo 'Old TV was kept';
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

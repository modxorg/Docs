---
title: "OnTemplateVarBeforeSave"
_old_id: "465"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforesave"
---

## Event: OnTemplateVarBeforeSave

Loaded right before saving a template variable to database.

- Service: 1 - Parser Service Events
- Group: Template Variables

## Event Parameters

| Name        | Description                                                                                                                      |
| ----------- | -------------------------------------------------------------------------------------------------------------------------------- |
| mode        | Either 'new' or 'upd', depending on the circumstances.                                                                           |
| templateVar | The instance of modTemplateVar class.                                                                                            |
| cacheFlag   | Indicates if the saved TV should be cached and optionally, by specifying an integer value, for how many seconds before expiring. |

## Remarks

| Previous event | —                                                                                                                                     |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnTemplateVarSave](extending-modx/plugins/system-events/ontemplatevarsave "OnTemplateVarSave")                                        |
| File           | [core/model/modx/modtemplatevar.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modtemplatevar.class.php) |
| Class          | modTemplateVar                                                                                                                         |
| Method         | public function save($cacheFlag = null)                                                                                                |

## Example

Such a plugin will display the data of the saved TV in the "Error log":

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnTemplateVarBeforeSave':
        //array tv, with all parameters
        print_r($templateVar->toArray());
        //checking for updating or creating the tv itself
        if ($mode == modSystemEvent::MODE_NEW){
            echo 'A new TV was created';
        } elseif ($mode == modSystemEvent::MODE_UPD){
            echo 'Old TV has been updated';
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

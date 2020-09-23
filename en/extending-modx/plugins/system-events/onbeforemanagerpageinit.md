---
title: "OnBeforeManagerPageInit"
_old_id: "385"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit"
---

## Event: OnBeforeManagerPageInit

Loaded right before a manager controller is run and after checking permissions.

- Service: 2 - Manager Access Events
- Group: System

## Event Parameters

| Name     | Description                                                             |
| -------- | ----------------------------------------------------------------------- |
| action   | The config array of current manager controller.                         |
| filename | The filename of the controller being loaded. (**Deprecated since 2.2**) |

## Remarks

| Previous event | [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit "OnManagerPageInit")                                                    |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")                            |
| File           | [core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php) |
| Class          | abstract class modManagerController                                                                                                                |
| Method         | public function render()                                                                                                                           |

## Example

Such a plugin will display in the "Error log" which controller has loaded:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerPageInit':
        print_r($action);
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

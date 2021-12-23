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

Please note that the event parameters for this event changed in 3.0.0-alpha2.

| Name     | Description                                                             |
| -------- | ----------------------------------------------------------------------- |
| action   | The route or action to load in the current namespace  |
| namespace | The namespace (as a string) for the current namespace |
| namespace_path | The core path for the namespace |

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

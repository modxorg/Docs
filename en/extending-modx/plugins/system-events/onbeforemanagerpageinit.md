---
title: "OnBeforeManagerPageInit"
description: "Fires right before a manager controller is run."
_old_id: "385"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit"
---

## Event: OnBeforeManagerPageInit

Fires right before a Manager controller runs, after the permission check.

- Service: 2 - Manager Access Events
- Group: System

## Event Parameters

| Name           | Description                                           |
| -------------- | ----------------------------------------------------- |
| action         | The route or action to load in the current namespace  |
| controller     | The same value as `action`                            |
| namespace      | The namespace (as a string) for the current namespace |
| namespace_path | The core path for the namespace                       |

On Manager error pages these keys are absent from the controller config — the Error controller is created with a `message` (and `errors`) only. Check them with `isset()` before use.

## Remarks

| Previous event | [OnManagerPageInit](extending-modx/plugins/system-events/onmanagerpageinit "OnManagerPageInit")                                             |
| -------------- | ------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")                     |
| File           | [core/src/Revolution/modManagerController.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerController.php) |
| Class          | abstract class MODX\Revolution\modManagerController                                                                                         |
| Method         | public function render()                                                                                                                    |

## Example

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

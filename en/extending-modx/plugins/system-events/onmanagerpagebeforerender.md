---
title: "OnManagerPageBeforeRender"
description: "Fires in the manager controller before the page content is processed."
_old_id: "437"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender"
---

## Event: OnManagerPageBeforeRender

Fires in the manager controller before content is processed.

- Service: 2 - Manager Access Events
- Group: System

## Event Parameters

| Name       | Description                          |
| ---------- | ------------------------------------ |
| controller | The current manager page controller. |

## Remarks

| Previous event | [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")                           |
| -------------- | ------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender "OnManagerPageAfterRender")                        |
| File           | [core/src/Revolution/modManagerController.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerController.php) |
| Class          | abstract class `modManagerController`                                                                                                       |
| Method         | public function render()                                                                                                                    |

## Example

Print the configuration of the controller being rendered:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerPageBeforeRender':
        // which controller is loading
        print_r($scriptProperties['controller']->config);
        print_r($scriptProperties['controller']->scriptProperties);
        break;
}
```

Block editing a Resource whose ID is missing from the `allow_to_update` option:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerPageBeforeRender':
        $controller = $scriptProperties['controller'];
        if ($controller->config['controller'] !== 'resource/update') {
            break;
        }
        $allow_to_update = $modx->getOption('allow_to_update');
        if (empty($allow_to_update)) {
            break;
        }
        if (!is_array($allow_to_update)) {
            $allow_to_update = array_map('trim', explode(',', $allow_to_update));
        }
        if (!in_array($controller->scriptProperties['id'], $allow_to_update)) {
            $controller->failure('Access is denied');
        }
        break;
}
```

Add a JavaScript file to manager pages:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerPageBeforeRender':
        $modx->controller->addJavascript('url/file.js');
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

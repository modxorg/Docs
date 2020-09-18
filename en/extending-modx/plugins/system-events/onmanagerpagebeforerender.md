---
title: "OnManagerPageBeforeRender"
_old_id: "437"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender"
---

## Event: OnManagerPageBeforeRender

Fired in the manager controller, before the processing of content.

- Service: 2 - Manager Access Events
- Group: System

## Event Parameters

| Name       | Description                                        |
| ---------- | -------------------------------------------------- |
| controller | The instance of current manager page's controller. |

## Remarks

| Previous event | [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")                                  |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender "OnManagerPageAfterRender")                               |
| File           | [core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php) |
| Class          | abstract class `modManagerController`                                                                                                                |
| Method         | public function render()                                                                                                                           |

## Example

Such a plugin will display in the "Error log" which controller is running:

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
                
Such a plugin will display "Access Denied" to users who have resource id in the parameter in the system settings `allow_to_update`:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerPageBeforeRender':
        switch($scriptProperties['controller']->config['controller']){
            //Checking the rights to edit documents
            case 'resource/update':
                // Check for the presence of the allow_to_update setting (set in the user settings)
                // In it we list which documents the user can edit
                // If the setting is specified, but the document id is not in the listed allowed,
                // Then return an access error
                if($allow_to_update = $modx->getOption('allow_to_update')){
                    if(!is_array($allow_to_update)){
                        $allow_to_update = explode(",", $allow_to_update);
                        $allow_to_update = array_map('trim', $allow_to_update);
                    }
                    if(in_array($scriptProperties['controller']->scriptProperties['id'], $allow_to_update)){
                        $scriptProperties['controller']->failure('Access is denied');
                        return;
                    }
                }
                break;
        }
        break;
}
```
                
Such a plugin will connect the js we need to the admin pages:

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

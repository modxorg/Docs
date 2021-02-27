---
title: "OnBeforePluginFormSave"
_old_id: "387"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforepluginformsave"
---

## Event: OnBeforePluginFormSave

Fires after a form is submitted but before a Plugin is saved in the manager.

- Service: 1 - Parser Service Events
- Group: Plugin

## Event Parameters

| Name   | Description                                           |
| ------ | ----------------------------------------------------- |
| mode   | Either 'upd' or 'new', depending on the circumstance. |
| plugin | A reference to the modPlugin object.                  |
| id     | The ID of the plugin. Will be 0 for new plugins.      |

## Examples of

Such a plugin displays a message stating that the field is not filled `description`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforePluginFormSave':
        if (!$plugin->get('description')){
            $modx->event->output("You haven't forgotten your head at home, but you forgot about the description! =)");
        }
        break;
}
```
                
Such a plugin will prevent the user from creating new plugins with `id=1`:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforePluginFormSave':
        // if it's a new plugin
        if ($mode == modSystemEvent::MODE_NEW){
            if ($modx->user->get('id') == 1){
                $modx->event->output("You are not allowed to create new plugins!");
            }
        }
        break;
}
``` 

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

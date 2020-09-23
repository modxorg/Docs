---
title: "OnBeforePluginFormDelete"
_old_id: "386"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforepluginformdelete"
---

## Event: OnBeforePluginFormDelete

Fires before a plugin is deleted in the manager.

- Service: 1 - Parser Service Events
- Group: Plugins

## Event Parameters

| Name   | Description                          |
| ------ | ------------------------------------ |
| plugin | A reference to the modPlugin object. |
| id     | The ID of the Plugin.                |


## Example

Such a plugin displays a message stating that the plugin cannot be removed:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforePluginFormDelete':
        // if plugin id = 18, display a message
        if ($id == 18){
            $modx->event->output("What are you doing !? Plugin cannot be deleted ".$plugin->get('name'));
        }
        break;
}

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

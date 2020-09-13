---
title: "OnBeforeChunkFormSave"
_old_id: "379"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforechunkformsave"
---

## Event: OnBeforeChunkFormSave

Fires after a form is submitted but before a Chunk is saved in the manager.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name  | Description                                           |
| ----- | ----------------------------------------------------- |
| mode  | Either 'upd' or 'new', depending on the circumstance. |
| chunk | A reference to the modChunk object.                   |
| id    | The ID of the chunk. Will be 0 for new chunks.        |

## Examples of

Such a plugin will display a message if the description field is not filled:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeChunkFormSave':
        //if we update an existing chunk
        if ($mode == modSystemEvent::MODE_UPD){
            //if description is not filled
            if (!$chunk->get('description')){
                $modx->event->output("You haven't forgotten anything?");
            }
        }
        break;
}
```
                
Such a plugin will write to the "Error log" whether a new chunk was created or an existing one was updated:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeChunkFormSave':
        if ($mode == modSystemEvent::MODE_UPD){
            echo 'An existing chunk has been updated';
        } elseif ($mode == modSystemEvent::MODE_NEW){
            echo 'Chunk was created';
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

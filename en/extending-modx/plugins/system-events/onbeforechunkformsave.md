---
title: "OnBeforeChunkFormSave"
description: "Fires after a form is submitted but before a Chunk is saved in the Manager."
_old_id: "379"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforechunkformsave"
---

## Event: OnBeforeChunkFormSave

Fires after a form is submitted but before a Chunk is saved in the Manager.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name   | Description                                           |
| ------ | ----------------------------------------------------- |
| mode   | Either 'upd' or 'new', depending on the circumstance. |
| chunk  | A reference to the modChunk object.                   |
| id     | The ID of the chunk. Will be 0 for new chunks.        |
| data   | The current fields of the Chunk as an array.          |
| object | Alias of `chunk` — a reference to the same object.    |

## Examples

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

---
title: "OnChunkFormSave"
_old_id: "410"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformsave"
---

## Event: OnChunkFormSave

Fires after a Chunk is saved in the manager.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name  | Description                                           |
| ----- | ----------------------------------------------------- |
| mode  | Either 'upd' or 'new', depending on the circumstance. |
| chunk | A reference to the modChunk object.                   |
| id    | The ID of the chunk.                                  |

## Example

Such a plugin will write the id of the saved chunk (new or just created) to the "Error log":

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormSave':
        if ($mode == modSystemEvent::MODE_NEW) {
            $modx->log(modX::LOG_LEVEL_ERROR, 'New chunk saved with id '.$id);
        } elseif ($mode == modSystemEvent::MODE_UPD){
            $modx->log(modX::LOG_LEVEL_ERROR, 'The existing chunk is saved with id '.$id);
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

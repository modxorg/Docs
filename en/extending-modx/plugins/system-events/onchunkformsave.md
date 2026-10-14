---
title: "OnChunkFormSave"
description: "Fires after a Chunk is created or updated in the Manager."
---

## Event: OnChunkFormSave

Fires after a Chunk is created or updated in the Manager, from the `Element\Chunk\Create` and `Update` processors.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name   | Description                                                     |
| ------ | --------------------------------------------------------------- |
| mode   | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| id     | The ID of the Chunk.                                            |
| chunk  | A reference to the modChunk object.                             |
| object | Alias of `chunk` — a reference to the same object.              |

## Example

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

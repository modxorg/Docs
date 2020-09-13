---
title: "OnBeforeChunkFormDelete"
_old_id: "378"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforechunkformdelete"
---

## Event: OnBeforeChunkFormDelete

Fires before a chunk is deleted.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name  | Description                         |
| ----- | ----------------------------------- |
| chunk | A reference to the modChunk object. |
| id    | The ID of the Chunk.                |

## Example

Such a plugin will display a message stating that you cannot delete a chunk:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeChunkFormDelete':
        if ($id == 69){
            $modx->event->output("Нельзя удалять чанк ".$chunk->get('name'));
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

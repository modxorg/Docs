---
title: "OnBeforeChunkFormDelete"
description: "Fires before a chunk is deleted."
_old_id: "378"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforechunkformdelete"
---

## Event: OnBeforeChunkFormDelete

Fires before a Chunk is deleted.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name  | Description                         |
| ----- | ----------------------------------- |
| chunk | A reference to the modChunk object. |
| id    | The ID of the Chunk.                |
| object | Alias of `chunk` — a reference to the same object. |

## Example

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeChunkFormDelete':
        if ($id == 69){
            $modx->event->output("Chunk cannot be deleted ".$chunk->get('name'));
        }
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnChunkFormDelete"
description: "Fires after a Chunk is deleted in the Manager."
---

## Event: OnChunkFormDelete

Fires after a Chunk is deleted in the Manager, from the `Element\Chunk\Remove` processor.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name   | Description                                                         |
| ------ | ------------------------------------------------------------------- |
| id     | The ID of the Chunk.                                                |
| chunk  | A reference to the modChunk object.                                 |
| object | Alias of `chunk` — a reference to the same object.                  |

## Example

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnChunkFormDelete':
        $n = $chunk->get('name');
        $modx->log(modX::LOG_LEVEL_ERROR, 'The chunk has been removed from id '.$id.' his name was '.$n.' you have no heart!');
        break;
}
```

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

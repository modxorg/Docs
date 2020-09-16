---
title: "OnChunkFormDelete"
_old_id: "407"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformdelete"
---

## Event: OnChunkFormDelete

Fires after a chunk is deleted.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name  | Description                         |
| ----- | ----------------------------------- |
| chunk | A reference to the modChunk object. |
| id    | The ID of the Chunk.                |

## Example

Such a plugin will write the id and name of the remote chunk to the "Error log":

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

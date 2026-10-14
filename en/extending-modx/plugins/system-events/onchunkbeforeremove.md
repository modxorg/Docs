---
title: "OnChunkBeforeRemove"
description: "Fires right before a Chunk is removed, in modChunk::remove()."
---

## Event: OnChunkBeforeRemove

Fires right before a Chunk is removed, in `modChunk::remove()`.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name      | Description                                          |
| --------- | ---------------------------------------------------- |
| chunk     | A reference to the modChunk object.                  |
| ancestors | An array of ancestors passed to the remove() method. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

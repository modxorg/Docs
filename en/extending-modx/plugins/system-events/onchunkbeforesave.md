---
title: "OnChunkBeforeSave"
description: "Fires right before a Chunk is saved, in modChunk::save()."
---

## Event: OnChunkBeforeSave

Fires right before a Chunk is saved, in `modChunk::save()`.

- Service: 1 - Parser Service Events
- Group: Chunks

## Event Parameters

| Name      | Description                                                      |
| --------- | ---------------------------------------------------------------- |
| mode      | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| chunk     | A reference to the modChunk object.                              |
| cacheFlag | The cacheFlag argument passed to the save() method.              |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

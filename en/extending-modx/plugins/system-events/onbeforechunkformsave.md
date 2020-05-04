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

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

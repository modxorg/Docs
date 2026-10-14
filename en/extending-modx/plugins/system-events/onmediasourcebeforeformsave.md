---
title: "OnMediaSourceBeforeFormSave"
description: "Fires right before a Media Source is saved."
---

## Event: OnMediaSourceBeforeFormSave

Fires right before a Media Source is saved.

- Service: 1 - Parser Service Events
- Group: Media Sources

## Event Parameters

| Name   | Description                                                                                                       |
| ------ | ----------------------------------------------------------------------------------------------------------------- |
| mode   | Either 'new' (modSystemEvent::MODE\_NEW) or 'upd' (modSystemEvent::MODE\_UPD) depending on whether is a new object or an existing one. |
| data   | An array of the data of the Media Source object.                                                                  |
| id     | The ID of the Media Source.                                                                                       |
| source | A reference to the modMediaSource object.                                                                         |
| object | A reference to the modMediaSource object.                                                                         |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

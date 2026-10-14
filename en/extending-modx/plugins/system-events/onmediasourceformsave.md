---
title: "OnMediaSourceFormSave"
description: "Fires after a media source is saved in the manager."
---

## Event: OnMediaSourceFormSave

Fires after a media source is saved in the manager.

- Service: 1 - Parser Service Events
- Group: Media Sources

## Event Parameters

| Name   | Description                                                                                                                            |
| ------ | -------------------------------------------------------------------------------------------------------------------------------------- |
| mode   | Either 'new' (modSystemEvent::MODE\_NEW) or 'upd' (modSystemEvent::MODE\_UPD) depending on whether is a new object or an existing one. |
| id     | The ID of the Media Source.                                                                                                            |
| source | A reference to the modMediaSource object.                                                                                              |
| object | A reference to the modMediaSource object.                                                                                              |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

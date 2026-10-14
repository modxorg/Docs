---
title: "OnFileManagerMoveObject"
description: "Fires after moving a file or directory to a new location in the media manager."
---

## Event: OnFileManagerMoveObject

Fires after a file or directory is moved to a new location.

- Service: 1 - Parser Service Events
- Group: System

## Event Parameters

| Name     | Description                                                                                      |
| -------- | ------------------------------------------------------------------------------------------------ |
| from     | The path the file or directory is moved from.                                                    |
| to       | The path the file or directory is moved to.                                                      |
| source   | The modMediaSource object that the file was moved from.                                          |
| toSource | The modMediaSource object the file was moved to, or `false` if not moving between media sources. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

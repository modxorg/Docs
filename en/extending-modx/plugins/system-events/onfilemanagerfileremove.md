---
title: "OnFileManagerFileRemove"
description: "Fires after removing a file via the manager."
_old_id: "1743"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfileremove"
---

## Event: OnFileManagerFileRemove

Fires after removing a file via the manager.

- Service: 1 - Parser Service Events
- Group: System

## Event Parameters

| Name      | Description                                               |
| --------- | --------------------------------------------------------- |
| directory | Contains the full path to the file that has been removed. |
| source    | Contains the modMediaSource object.                       |

> [!TIP]
> Unlike the other OnFileManager* file events, this event names its path parameter `directory` rather than `path`.

## See Also

- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)

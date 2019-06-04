---
title: "OnFileManagerFileRename"
_old_id: "1744"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerfilerename"
---

## Event: OnFileManagerFileRename

Fires after renaming a file via the manager. The old filename can be retrieved using the $\_POST variable.

Service: 1 - Parser Service Events
Group: None

## Event Parameters

| Name   | Description                                 |
| ------ | ------------------------------------------- |
| path   | Contains the full path to the renamed file. |
| source | Contains the mediasource object.            |

## See Also

- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)

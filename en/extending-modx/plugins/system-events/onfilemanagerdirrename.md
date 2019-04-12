---
title: "OnFileManagerDirRename"
_old_id: "1741"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerdirrename"
---

## Event: OnFileManagerDirRename

 Fires after renaming a directory via the manager. The old directory name can be retrieved using the $\_POST variable.

 Service: 1 - Parser Service Events
 Group: None

## Event Parameters

 | Name      | Description                                      |
 | --------- | ------------------------------------------------ |
 | directory | Contains the full path to the renamed directory. |
 | source    | Contains mediasource object.                     |

## See Also

- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)

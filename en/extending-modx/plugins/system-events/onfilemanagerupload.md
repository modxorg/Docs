---
title: "OnFileManagerUpload"
description: "Fires after files have been uploaded via the manager."
_old_id: "426"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload"
---

## Event: OnFileManagerUpload

Fires after files are uploaded via the manager.

- Service: 1 - Parser Service Events
- Group: System

## Event Parameters

| Name      | Description                                                                                   |
| --------- | --------------------------------------------------------------------------------------------- |
| files     | An array of files from the PHP $\_FILES array.                                                |
| directory | Target directory, relative to the media source root, the files were uploaded to.             |
| source    | The modMediaSource object that the file was uploaded to.                                      |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnFileManagerUpload"
_old_id: "426"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload"
---

## Event: OnFileManagerUpload

Fires after any files are uploaded via the manager.

Service: 1 - Parser Service Events 
 Group: None

## Event Parameters

| Name | Description |
|------|-------------|
| files | An array of files from the PHP $\_FILES array. |
| directory | A reference to the modDirectory object that the files are being uploaded to. |
| source | The modMediaSource object that the file was uploaded to. |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
---
title: "OnFileManagerBeforeUpload"
description: "Fires before a file is uploaded via the manager, inside the upload loop."
_old_id: "1738"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerbeforeupload"
---

## Event: OnFileManagerBeforeUpload

Fires inside the `foreach` loop over `$_FILES`, before any file is uploaded.

- Service: 1 - Parser Service Events
- Group: System

## Event Parameters

| Name      | Description                                                          |
| --------- | -------------------------------------------------------------------- |
| files     | All files from the PHP $\_FILES array.                               |
| file      | The current file in the $\_FILES loop.                               |
| directory | Target directory, relative to the media source root, to upload into. |
| source    | Contains the modMediaSource object.                                  |


## See Also

- [System Events](extending-modx/plugins/system-events)
- [Plugins](extending-modx/plugins)

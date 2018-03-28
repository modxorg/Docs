---
title: "OnFileManagerBeforeUpload"
_old_id: "1738"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerbeforeupload"
---

## Event: OnFileManagerBeforeUpload

 Fires before any files are uploaded via the manager and is fired inside a foreach loop that loops throught the $\_FILES array.

 Service: 1 - Parser Service Events 
 Group: None

## Event Parameters

  Name   Description   files   An array of files from the PHP $\_FILES array.   file   An array of the current file looping through the PHP $\_FILES array.   directory   A reference to the modDirectory object that the files are being uploaded to.   source   Contains mediasource object. ## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events)
- [Plugins](developing-in-modx/basic-development/plugins)
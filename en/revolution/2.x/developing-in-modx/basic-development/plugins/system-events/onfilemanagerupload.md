---
title: "OnFileManagerUpload"
_old_id: "426"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerupload"
---

Event: OnFileManagerUpload
--------------------------

Fires after any files are uploaded via the manager.

Service: 1 - Parser Service Events   
 Group: None

Event Parameters
----------------

<table><tbody><tr><th>Name</th> <th>Description</th> </tr><tr><td>files</td> <td>An array of files from the PHP $\_FILES array.</td> </tr><tr><td>directory</td> <td>A reference to the modDirectory object that the files are being uploaded to.</td> </tr><tr><td>source</td> <td>The modMediaSource object that the file was uploaded to. </td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")
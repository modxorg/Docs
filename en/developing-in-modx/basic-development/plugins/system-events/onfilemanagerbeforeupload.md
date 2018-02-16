---
title: "OnFileManagerBeforeUpload"
_old_id: "1738"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onfilemanagerbeforeupload"
---

Event: OnFileManagerBeforeUpload
--------------------------------

 Fires before any files are uploaded via the manager and is fired inside a foreach loop that loops throught the $\_FILES array.

 Service: 1 - Parser Service Events   
 Group: None

Event Parameters
----------------

 <table><tbody><tr><th> Name </th> <th> Description </th> </tr><tr><td> files </td> <td> An array of files from the PHP $\_FILES array. </td> </tr><tr><td> file </td> <td> An array of the current file looping through the PHP $\_FILES array. </td> </tr><tr><td> directory </td> <td> A reference to the modDirectory object that the files are being uploaded to. </td> </tr><tr><td> source </td> <td> Contains mediasource object. </td></tr></tbody></table>See Also
--------

- [System Events](https://rtfm.modx.com/revolution/2.x/developing-in-modx/basic-development/plugins/system-events)
- [Plugins](https://rtfm.modx.com/revolution/2.x/developing-in-modx/basic-development/plugins)
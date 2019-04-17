---
title: "FileDownloadLink"
_old_id: "842"
_old_uri: "revo/filedownload-r/filedownload-r.filedownloadlink"
---

FileDownloadLink is a snippet for a single downloadable file.
It's just like providing the link to the direct file.
But in this case, FileDownloadLink will hide the real path of the file with the hashed link and count the downloading action.

Basic usage is \[\[!FileDownloadLink?\]\]

## Main

| Name       | Description                                                                                                                                              | Example                                        | Default Value | Options   |
| ---------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------- | ------------- | --------- |
| getFile    | You may only have ONE file path on this parameter                                                                                                        | &getFile=`assets/files/readme.txt`             | empty         | string    |
| userGroups | This will make the download link active for users that belong to the specified groups. Multiple groups can be specified by using a comma delimited list. | &userGroups=`Administrator, Registered Member` | empty         | string    |
| toArray    | Returns the result as an array instead, not parsed in the templates.                                                                                     | &toArray=`1`                                   | 0             | bool: 0/1 |

## Salt for hash

| Name     | Description                                                                   | Default Value | Options |
| -------- | ----------------------------------------------------------------------------- | ------------- | ------- |
| saltText | This text will be added to the file's hashed link to disguise the direct path | FileDownload  | string  |

The link is a hashed text of the saltText, context, and filename/dirname combination.
So if you change the saltText value after a while, it will not block the content's appearance from the page, but the database will start the counter from zero again since it will not find the same hashed value.

## Additional

| Name                                           | Description                                                                        | Example                      | Default Value                               | Options             |
| ---------------------------------------------- | ---------------------------------------------------------------------------------- | ---------------------------- | ------------------------------------------- | ------------------- |
| noDownload                                     | This property will make the list only displays files without their download links. |
| note: this is different from the Evo's version | &noDownload=`1`                                                                    | 0                            | bool: 0/1                                   |
| chkDesc                                        | Allows descriptions to be added to the file listing included in a chunk.           | &chkDesc=`fileDesc`          | fileDescription                             | chunk's name        |
| dateFormat                                     | PHP's date formatting for the list                                                 | &dateFormat=`m/d/Y`          | Y-m-d                                       | string              |
| countDownloads                                 | Tracking the downloading                                                           | &countDownloads=`1`          | 0                                           | bool: 0/1           |
| imgTypes                                       | A chunk name to define the associations between file extension and image           | &imgTypes=`fdImages`         | fdImages                                    | chunk's name        |
| imgLocat                                       | Path to the images to associate with each file extension.                          | &imgLocat=`assets/filetypes` | assets/components/filedownload/img/filetype | web accessible path |

## Template

The template for this snippet is a plain href link with FileDownloadLink's placeholders, not a chunk or a template file.
If you like to see the available placeholders, just initiate the &toArray=`1` parameter.

| Name    | Description   | Example                                                  | Default Value                                 | Options   |
| ------- | ------------- | -------------------------------------------------------- | --------------------------------------------- | --------- |
| tplCode | file template | &tplCode=`<a href="\[\[+link\]\]">\[\[+filename\]\]</a>` | <a href="\[\[+link\]\]">\[\[+filename\]\]</a> | HTML code |

## Headers

| Name    | Description                                                   | Default Value                             | Options  |
| ------- | ------------------------------------------------------------- | ----------------------------------------- | -------- |
| fileCss | FileDownload's Cascading Style Sheet file for the page header | assets/components/filedownload/css/fd.css | web path |
| fileJs  | ileDownload's Javascript file for the page header             | assets/components/filedownload/js/fd.js   | web path |

## Example

 ``` php
[[!FileDownloadLink?
&getFile=`[[++core_path]]downloads/Document1.doc`
&tplCode=`
<a href="[[+link]]" title="[[+filename]]">
    <span class="gradient curve-four" style="display: block; text-align: center;">
        <img src="[[+image]]" alt="" />Download this Document1.doc<hr />
        [[+date]]<br />([[+count]] downloads)
    </span>
</a>`
&dateFormat=`d-m-Y`
&toArray=`0`
]]
```

![](/download/attachments/35586646/filedownloadlink.jpg?version=1&modificationDate=1315759899000)

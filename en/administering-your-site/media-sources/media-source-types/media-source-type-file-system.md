---
title: "Media Source Type - File System"
_old_id: "366"
_old_uri: "2.x/administering-your-site/media-sources/media-source-types/media-source-type-file-system"
---

<div>- [The File System Media Source Type](#MediaSourceType-FileSystem-TheFileSystemMediaSourceType)
- [Available Properties](#MediaSourceType-FileSystem-AvailableProperties)
- [See Also](#MediaSourceType-FileSystem-SeeAlso)

</div>The File System Media Source Type
---------------------------------

This Source Type allows you to browse the file system your MODX installation resides on.

Available Properties
--------------------

<table id="TBL1376497247037"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>basePath</td><td>The file path to point the Source to. If relative, the path relative to the MODX base path.</td></tr><tr><td>basePathRelative</td><td>If the Base Path setting above is not relative to the MODX install path, set this to Yes.</td></tr><tr><td>baseUrl</td><td>The URL that this source can be accessed from. If relative, the URL relative to the MODX base URL.</td></tr><tr><td>baseUrlRelative</td><td>If the Base URL setting above is not relative to the MODX install URL, set this to Yes.</td></tr><tr><td>allowedFileTypes</td><td>If set, will restrict the files shown to only the specified extensions. Please specify in a comma-separated list, without the .</td><td> </td></tr><tr><td>imageExtensions</td><td>A list of file extensions that can be made into thumbnails.</td><td>jpg,jpeg,png,gif</td></tr><tr><td>thumbnailType</td><td>When a thumbnail is displayed, the type of image it will be rendered as.</td><td>png</td></tr><tr><td>thumbnailQuality</td><td>The quality of the rendered thumbnail, on a scale from 0-100</td><td>90</td></tr><tr><td>skipFiles</td><td>A comma-separated list of filenames to skip when browsing the source.</td><td>.svn,.git,\_notes,nbproject,.idea,.DS\_Store</td></tr></tbody></table>See Also
--------

1. [Media Source Type - File System](administering-your-site/media-sources/media-source-types/media-source-type-file-system)
2. [Media Source Type - S3](administering-your-site/media-sources/media-source-types/media-source-type-s3)
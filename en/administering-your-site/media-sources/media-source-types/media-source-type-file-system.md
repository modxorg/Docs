---
title: "Media Source Type - File System"
_old_id: "366"
_old_uri: "2.x/administering-your-site/media-sources/media-source-types/media-source-type-file-system"
---

- [The File System Media Source Type](#MediaSourceType-FileSystem-TheFileSystemMediaSourceType)
- [Available Properties](#MediaSourceType-FileSystem-AvailableProperties)
- [See Also](#MediaSourceType-FileSystem-SeeAlso)



## The File System Media Source Type

This Source Type allows you to browse the file system your MODX installation resides on.

## Available Properties

NameDescriptionDefault ValuebasePathThe file path to point the Source to. If relative, the path relative to the MODX base path.basePathRelativeIf the Base Path setting above is not relative to the MODX install path, set this to Yes.baseUrlThe URL that this source can be accessed from. If relative, the URL relative to the MODX base URL.baseUrlRelativeIf the Base URL setting above is not relative to the MODX install URL, set this to Yes.allowedFileTypesIf set, will restrict the files shown to only the specified extensions. Please specify in a comma-separated list, without the . imageExtensionsA list of file extensions that can be made into thumbnails.jpg,jpeg,png,gifthumbnailTypeWhen a thumbnail is displayed, the type of image it will be rendered as.pngthumbnailQualityThe quality of the rendered thumbnail, on a scale from 0-10090skipFilesA comma-separated list of filenames to skip when browsing the source..svn,.git,\_notes,nbproject,.idea,.DS\_Store## See Also

1. [Media Source Type - File System](administering-your-site/media-sources/media-source-types/media-source-type-file-system)
2. [Media Source Type - S3](administering-your-site/media-sources/media-source-types/media-source-type-s3)
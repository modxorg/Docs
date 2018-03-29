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

| Name | Description | Default Value |
|------|-------------|---------------|
| basePath | The file path to point the Source to. If relative, the path relative to the MODX base path. |
| basePathRelative | If the Base Path setting above is not relative to the MODX install path, set this to Yes. |
| baseUrl | The URL that this source can be accessed from. If relative, the URL relative to the MODX base URL. |
| baseUrlRelative | If the Base URL setting above is not relative to the MODX install URL, set this to Yes. |
| allowedFileTypes | If set, will restrict the files shown to only the specified extensions. Please specify in a comma-separated list, without the . |  |
| imageExtensions | A list of file extensions that can be made into thumbnails. | jpg,jpeg,png,gif |
| thumbnailType | When a thumbnail is displayed, the type of image it will be rendered as. | png |
| thumbnailQuality | The quality of the rendered thumbnail, on a scale from 0-100 | 90 |
| skipFiles | A comma-separated list of filenames to skip when browsing the source. | .svn,.git,\_notes,nbproject,.idea,.DS\_Store |

## See Also

1. [Media Source Type - File System](administering-your-site/media-sources/media-source-types/media-source-type-file-system)
2. [Media Source Type - S3](administering-your-site/media-sources/media-source-types/media-source-type-s3)
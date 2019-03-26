---
title: "Media Source Type - S3"
_old_id: "367"
_old_uri: "2.x/administering-your-site/media-sources/media-source-types/media-source-type-s3"
---

- [The Amazon S3 Media Source Type](#the-amazon-s3-media-source-type)
  - [Available Properties](#available-properties)
- [See Also](#see-also)



## The Amazon S3 Media Source Type

This media source type allows you to connect to an Amazon S3 bucket.

### Available Properties

| Name             | Description                                                                                                                                                                                                                             | Default Value                                |
| ---------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------- |
| url              | Required. The URL to the Amazon S3 instance. Often <http://myaccount.s3.amazonaws.com/> or <https://s3.amazonaws.com/myaccount/>. If you're having issues seeing thumbnails but it works properly, make sure the url ends with a slash. |                                              |
| bucket           | Required. The bucket to connect the source to.                                                                                                                                                                                          |                                              |
| key              | Required. The Amazon key used for authentication to the bucket.                                                                                                                                                                         |
| secret\_key      | Required. The Amazon secret key for authentication to the bucket.                                                                                                                                                                       |
| imageExtensions  | A list of file extensions that can be made into thumbnails.                                                                                                                                                                             | jpg,jpeg,png,gif                             |
| thumbnailType    | When a thumbnail is displayed, the type of image it will be rendered as.                                                                                                                                                                | png                                          |
| thumbnailQuality | The quality of the rendered thumbnail, on a scale from 0-100                                                                                                                                                                            | 90                                           |
| skipFiles        | A comma-separated list of filenames to skip when browsing the source.                                                                                                                                                                   | .svn,.git,\_notes,nbproject,.idea,.DS\_Store |

## See Also

1. [Media Source Type - File System](building-sites/media-sources/types/media-source-type-file-system)
2. [Media Source Type - S3](building-sites/media-sources/types/media-source-type-s3)
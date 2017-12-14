---
title: "Media Source Type - S3"
_old_id: "367"
_old_uri: "2.x/administering-your-site/media-sources/media-source-types/media-source-type-s3"
---

<div>- [The Amazon S3 Media Source Type](#MediaSourceType-S3-TheAmazonS3MediaSourceType)
  - [Available Properties](#MediaSourceType-S3-AvailableProperties)
- [See Also](#MediaSourceType-S3-SeeAlso)

</div>The Amazon S3 Media Source Type
-------------------------------

This media source type allows you to connect to an Amazon S3 bucket.

### Available Properties

<table id="TBL1376497247038"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>url</td><td>Required. The URL to the Amazon S3 instance. Often <http://myaccount.s3.amazonaws.com/> or <https://s3.amazonaws.com/myaccount/>. If you're having issues seeing thumbnails but it works properly, make sure the url ends with a slash.</td><td> </td></tr><tr><td>bucket</td><td>Required. The bucket to connect the source to.</td><td> </td></tr><tr><td>key</td><td>Required. The Amazon key used for authentication to the bucket.</td></tr><tr><td>secret\_key</td><td>Required. The Amazon secret key for authentication to the bucket.</td></tr><tr><td>imageExtensions</td><td>A list of file extensions that can be made into thumbnails.</td><td>jpg,jpeg,png,gif</td></tr><tr><td>thumbnailType</td><td>When a thumbnail is displayed, the type of image it will be rendered as.</td><td>png</td></tr><tr><td>thumbnailQuality</td><td>The quality of the rendered thumbnail, on a scale from 0-100</td><td>90</td></tr><tr><td>skipFiles</td><td>A comma-separated list of filenames to skip when browsing the source.</td><td>.svn,.git,\_notes,nbproject,.idea,.DS\_Store</td></tr></tbody></table>See Also
--------

1. [Media Source Type - File System](/revolution/2.x/administering-your-site/media-sources/media-source-types/media-source-type-file-system)
2. [Media Source Type - S3](/revolution/2.x/administering-your-site/media-sources/media-source-types/media-source-type-s3)
---
title: "Media Source Type - S3"
_old_id: "367"
_old_uri: "2.x/administering-your-site/media-sources/media-source-types/media-source-type-s3"
---

- [The Amazon S3 Media Source Type](#MediaSourceType-S3-TheAmazonS3MediaSourceType)
  - [Available Properties](#MediaSourceType-S3-AvailableProperties)
- [See Also](#MediaSourceType-S3-SeeAlso)



## The Amazon S3 Media Source Type

This media source type allows you to connect to an Amazon S3 bucket.

### Available Properties

NameDescriptionDefault ValueurlRequired. The URL to the Amazon S3 instance. Often <http://myaccount.s3.amazonaws.com/> or <https://s3.amazonaws.com/myaccount/>. If you're having issues seeing thumbnails but it works properly, make sure the url ends with a slash. bucketRequired. The bucket to connect the source to. keyRequired. The Amazon key used for authentication to the bucket.secret\_keyRequired. The Amazon secret key for authentication to the bucket.imageExtensionsA list of file extensions that can be made into thumbnails.jpg,jpeg,png,gifthumbnailTypeWhen a thumbnail is displayed, the type of image it will be rendered as.pngthumbnailQualityThe quality of the rendered thumbnail, on a scale from 0-10090skipFilesA comma-separated list of filenames to skip when browsing the source..svn,.git,\_notes,nbproject,.idea,.DS\_Store## See Also

1. [Media Source Type - File System](administering-your-site/media-sources/media-source-types/media-source-type-file-system)
2. [Media Source Type - S3](administering-your-site/media-sources/media-source-types/media-source-type-s3)
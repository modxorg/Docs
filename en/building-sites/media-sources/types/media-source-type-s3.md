---
title: "Media Source Type - S3"
_old_id: "367"
_old_uri: "2.x/administering-your-site/media-sources/media-source-types/media-source-type-s3"
---

## The Amazon S3 Media Source Type

This Media Source type connects the Manager to an Amazon S3 bucket (or an S3-compatible store via `endpoint`).

### Available Properties

| Name | Description |
| --- | --- |
| url | Required. Base URL for objects in the bucket. Often `https://myaccount.s3.amazonaws.com/` or `https://s3.amazonaws.com/myaccount/`. If thumbnails fail while files otherwise work, end the URL with a slash. |
| endpoint | Optional S3-compatible endpoint (for example `https://s3.<region>.example.com`). Leave empty for Amazon S3. |
| region | AWS region of the bucket (example: `us-west-1`). Default in Revolution 3.x: `us-east-2`. A wrong region is a common reason the Media Browser lists no files. Set the region where you created the bucket. If listing still fails after credentials and bucket name are correct, clear `region`, save, then enter the matching region code (or leave it blank and save again to retry). |
| bucket | Required. S3 bucket name for this source. |
| prefix | Optional path prefix inside the bucket. |
| key | Required. Access key ID for the bucket. |
| secret\_key | Required. Secret access key for the bucket. |
| no\_check\_bucket | If yes, MODX skips checking that the bucket exists. Use this when the access key cannot list or create buckets. |
| imageExtensions | Comma-separated extensions treated as images for thumbnails. **Default**: `jpg,jpeg,png,gif,svg,webp` |
| thumbnailType | Image format for generated thumbnails. **Default**: `png` |
| thumbnailQuality | Thumbnail quality from 0 to 100. **Default**: `90` |
| skipFiles | Comma-separated names to hide while browsing. **Default**: `.svn,.git,_notes,nbproject,.idea,.DS_Store` |
| visibility | Default Flysystem visibility for **new files**: `public` or `private`. **Default**: `private`. S3 sources support file visibility only (`visibility_dirs` is false), so folder Set Visibility is not offered. |

MODX 3 media sources use League Flysystem (AWS SDK v3 for this type). Custom media source classes should target the Flysystem-based APIs rather than the pre-3.0 filesystem helpers.

## See Also

1. [Media Source Type - File System](building-sites/media-sources/types/media-source-type-file-system)
2. [Media Source Type - S3](building-sites/media-sources/types/media-source-type-s3)

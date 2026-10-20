---
title: "Media Source Type - FTP"
---

## The FTP Media Source Type

This Source Type reads and writes files on a remote server over FTP. It is built into the core on the adapter of Flysystem for FTP and needs no extra installation.

## Available Properties

| Name | Description |
| --- | --- |
| `host` | The hostname of the FTP server. |
| `username` | The account to log in with. **Default**: `anonymous` |
| `password` | The password of the account. |
| `root` | The directory the source starts at. |
| `url` | The public address of the files, for example `https://files.example.com/`. The previews in the manager use it. |
| `port` | The port of the FTP server. **Default**: `21` |
| `passive` | Whether to use the passive mode. **Default**: `true` |
| `ssl` | Whether to use FTPS, the FTP over SSL. **Default**: `false` |
| `timeout` | The timeout of the connection, in seconds. **Default**: `30` |
| `imageExtensions` | Comma-separated list of extensions treated as images. **Default**: `jpg,jpeg,png,gif,webp` |
| `skipFiles` | Comma-separated list of names to hide. **Default**: `.svn,.git,_notes,nbproject,.idea,.DS_Store` |
| `skipExtensions` | Comma-separated list of extensions to hide. **Default**: empty |

## Previews and Visibility

The preview of an object is the address of the object itself, built from the `url` property. This type generates no thumbnails, so it has no `thumbnailType` and no `thumbnailQuality` property.

This type has no `visibility` property, so new files are always created public. The visibility of a file that exists already may still be changed in the manager.

## Using the Source

Create a Media Source as described in [Adding a Media Source](building-sites/media-sources/creating "Adding a Media Source"). Pick **File Transfer Protocol** as the type and fill in the connection properties. Then assign the source to TVs or use it in code.

## See Also

1. [Media Sources](building-sites/media-sources)
2. [Adding a Media Source](building-sites/media-sources/creating)
3. [Assigning Media Sources to TVs](building-sites/media-sources/assigning-to-tvs)
4. [Securing a Media Source](building-sites/media-sources/securing)
   1. [Creating a Client Media Source](building-sites/media-sources/securing/clients-tutorial)
5. [Media Source Types](building-sites/media-sources/types)
   1. [Media Source Type - File System](building-sites/media-sources/types/media-source-type-file-system)
   2. [Media Source Type - FTP](building-sites/media-sources/types/media-source-type-ftp)
   3. [Media Source Type - S3](building-sites/media-sources/types/media-source-type-s3)
6. [Extending Media Sources](building-sites/media-sources/extending)

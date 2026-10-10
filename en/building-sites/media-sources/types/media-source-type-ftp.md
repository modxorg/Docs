---
title: "Media Source Type - FTP"
---

## FTP

**Type name**: File Transfer Protocol

Reads and writes files on a remote server over FTP. Built into the core (based on Flysystem's FTP adapter) and available in the Media Source type list without installing anything extra.

### Properties

| Property | Description |
| --- | --- |
| `host` | FTP server hostname |
| `username` | Account name |
| `password` | Account password |
| `port` | FTP port |
| `root` | Remote starting directory |
| `passive` | Use passive mode |
| `ssl` | Use FTPS (SSL/TLS) |
| `timeout` | Connection timeout in seconds |

### Usage

Create a Media Source as described in [Adding a Media Source](building-sites/media-sources/creating), pick **File Transfer Protocol** as the type, fill in the connection properties, then assign the source to TVs or use it in code. See [Media Sources](building-sites/media-sources) for the general concept.

## See Also

1. [Media Source Types](building-sites/media-sources/types)
2. [Media Source Type - File System](building-sites/media-sources/types/media-source-type-file-system)
3. [Media Source Type - S3](building-sites/media-sources/types/media-source-type-s3)

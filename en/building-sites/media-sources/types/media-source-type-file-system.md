---
title: "Media Source Type - File System"
description: "The File System Source Type in MODX: its properties, the visibility of files and folders, the rights of new objects, and the protected system directories."
_old_id: "366"
_old_uri: "2.x/administering-your-site/media-sources/media-source-types/media-source-type-file-system"
---

## The File System Media Source Type

This Source Type lets you browse a directory of the server that runs MODX.

In MODX 3 the driver is League Flysystem with a local adapter.

## Available Properties

| Name | Description |
| --- | --- |
| `basePath` | The directory the Source points to, for example `assets/images/`. It is relative when `basePathRelative` is on. |
| `basePathRelative` | Whether `basePath` is relative to the MODX install directory. **Default**: `true` |
| `baseUrl` | The address the files are served from, for example `assets/images/`. It is relative when `baseUrlRelative` is on. |
| `baseUrlRelative` | Whether `baseUrl` is relative to the MODX install address. **Default**: `true` |
| `allowedFileTypes` | Comma-separated list of extensions to show, without the dots. Empty shows every extension. |
| `imageExtensions` | Comma-separated list of extensions treated as images. **Default**: `jpg,jpeg,png,gif,svg,webp` |
| `thumbnailType` | Format of the generated thumbnails: `png`, `jpg`, `gif` or `webp`. **Default**: `png` |
| `thumbnailQuality` | Quality of the generated thumbnails, from 0 to 100. **Default**: `90` |
| `visibility` | Visibility of new files and folders: `public` or `private`. **Default**: `public` |
| `skipFiles` | Comma-separated list of names to hide. **Default**: `.svn,.git,_notes,nbproject,.idea,.DS_Store` |
| `skipExtensions` | Comma-separated list of extensions to hide. **Default**: empty |

**`skipExtensions` works in the browser window only**
The Files tree hides the names listed in `skipFiles` and the extensions listed in `allowedFileTypes`. It does not look at `skipExtensions`. The browser window hides all three.

## File and Folder Visibility

A File System source carries the visibility of files and folders that Flysystem provides.

- A private object shows an `icon-eye-slash` instead of the usual folder or file icon in the Files tree.
- Right-click a file or a folder and choose **Set Visibility** to make it public or private.
- The `visibility` property is only the default for new objects. It does not change the objects that exist already.
- Changing the visibility needs the `directory_chmod` permission and the `save` criterion of the source policy.

Some adapters and some file types refuse a visibility change. The error log says why.

## Rights of New Files and Folders

The core sets the rights of new objects itself, through the visibility of Flysystem:

| Object | Public | Private |
| --- | --- | --- |
| File | `0644` | `0600` |
| Folder | `0755` | `0700` |

A site changes these with the `new_file_permissions`, `new_folder_permissions`, `private_file_permissions` and `private_folder_permissions` system settings.

## Protected System Directories

The browser refuses to rename or remove the directories that resolve to the paths of the core installation. They are `assets`, the base path, `connectors`, `core`, `manager`, `processors` and the xPDO core path.

Pointing a File System source at the MODX root does not let you delete or rename those folders from the Files tree. Make the sources for daily work under `assets/`, or under another tree outside the core.

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

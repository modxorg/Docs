---
title: "Media Source Type - File System"
_old_id: "366"
_old_uri: "2.x/administering-your-site/media-sources/media-source-types/media-source-type-file-system"
---

## The File System Media Source Type

This Source Type allows you to browse the file system your MODX installation resides on.

In MODX 3 the driver is League Flysystem with a local adapter.

## Available Properties

| Name             | Description                                                                                                                           |
| ---------------- | ------------------------------------------------------------------------------------------------------------------------------------- |
| basePath         | The file path to point the Source to. If relative, the path relative to the MODX base path.                                           |
| basePathRelative | If the Base Path setting above is not relative to the MODX install path, set this to Yes.                                             |
| baseUrl          | The URL that this source can be accessed from. If relative, the URL relative to the MODX base URL.                                    |
| baseUrlRelative  | If the Base URL setting above is not relative to the MODX install URL, set this to Yes.                                               |
| allowedFileTypes | If set, will restrict the files shown to only the specified extensions. Please specify in a comma-separated list, without the .       |
| imageExtensions  | A list of file extensions that can be made into thumbnails. **Default Value**: jpg,jpeg,png,gif                                       |
| thumbnailType    | When a thumbnail is displayed, the type of image it will be rendered as. **Default Value**: png                                       |
| thumbnailQuality | The quality of the rendered thumbnail, on a scale from 0-100. **Default Value**: 90                                                   |
| skipFiles        | A comma-separated list of filenames to skip when browsing the source. **Default Value**: .svn,.git,\_notes,nbproject,.idea,.DS\_Store |
| visibility       | Default Flysystem visibility for **new** files and folders: `public` or `private`. **Default**: `public`. Added in MODX 3.0. |

### File and folder visibility (MODX 3.0+)

File System sources support Flysystem visibility for both files and folders (`visibility_files` and `visibility_dirs` are enabled).

- Private objects show an `icon-eye-slash` instead of the normal folder / file icon in the Files tree.
- Right-click a file or folder → **Set Visibility** → choose Public or Private.
- The source `visibility` property is only the default for newly created objects. It does not rewrite existing items.
- Changing visibility requires media-source save access. Folder menu items also need `directory_chmod`. File menu items need `file_update` (the processor still checks `directory_chmod`).

Some remote adapters and certain file types (for example some `.php` paths) may refuse a visibility change. Check the error log if Set Visibility fails.

### Protected system directories (MODX 3.0+)

Browser processors refuse to **rename or remove** directories that resolve to core install paths: assets, base, connectors, core, manager, processors, and the xPDO core path. [#14374](https://github.com/modxcms/revolution/pull/14374) Pointing a File System source at the MODX root does not let you delete or rename those folders from the Files tree. Create sources under `assets/` (or another non-core tree) for day-to-day media work.

## See Also

1. [Media Source Type - File System](building-sites/media-sources/types/media-source-type-file-system)
2. [Media Source Type - S3](building-sites/media-sources/types/media-source-type-s3)

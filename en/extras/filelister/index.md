---
title: "FileLister"
_old_id: "640"
_old_uri: "revo/filelister"
---

## What is FileLister?

FileLister is a dynamic file listing Extra for MODX Revolution. It allows you to list files within a directory, as well as securely browse through subdirectories.

## Requirements

- MODX Revolution 2.0.0-rc-2 or later
- PHP5 or later

## Historyand Info

FileLister was written by Shaun McCormick (splittingred) as a dynamic file listing component, and first released on June 30th, 2010.

You can view the [roadmap here](extras/filelister/filelister.roadmap "FileLister.Roadmap").

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, available here: <https://modx.com/extras/package/filelister>

### Development and Bug Reporting

FileLister is stored and developed in GitHub, and can be found here: <http://github.com/splittingred/FileLister>

## Usage

FileLister can be called via the Snippet tags, and passing a 'path' argument.

### Snippets

FileLister comes with one snippet:

- [FileLister](extras/filelister/filelister "FileLister.FileLister")

### System Settings

| Name            | Description                       |
| --------------- | --------------------------------- |
| filelister.salt | A custom salt for the navigation. |

## Examples

List all the files and directories in assets/downloads.

``` php
[[!FileLister? &path=`assets/downloads/`]]
```

List only files in the 'assets/pdfs' directory.

``` php
[[!FileLister? &path=`assets/pdfs/`]]
```

List all files and subdirectories in '/docs/marketing', but don't allow file viewing or downloading except for users logged in and in the 'Marketing' or 'CEO' groups.

``` php
[[!FileLister? &path=`/docs/marketing/` &allowDownloadGroups=`Marketing,CEO`]]
```

Restrict file listings in 'assets/pdfs' to only PDF files:

``` php
[[!FileLister? &path=`assets/pdfs/` &hideDirectories=`1` &showExt=`pdf`]]
```

## Sample Resource Content

This is a sample of HTML that you can put inside a Resource to output your content. You'll need to have the toPlaceholder property set to 'files' for this to work, and call your FileLister snippet uncached **before** this HTML.

``` html
<h2>Files</h2>

<p>Current Path: <span>[[+filelister.path]]</span></p>

<table>
<thead>
<tr>
  <th>Name</th>
  <th>Filesize</th>
  <th>Last Modified</th>
</tr>
</thead>
<tfoot>
<tr>
  <th colspan="3">
    Files: [[+filelister.total.files]]
    | Directories: [[+filelister.total.directories]]
  </th>
</tr>
<tbody>
[[+files]]
</tbody>
</table>
```

## See Also

1. [FileLister.FileLister](extras/filelister)
    1. [FileLister.FileLister.directoryTpl](extras/filelister/filelister/directorytpl)
    2. [FileLister.FileLister.fileLinkTpl](extras/filelister/filelister/filelinktpl)
    3. [FileLister.FileLister.fileTpl](extras/filelister/filelister/filetpl)
    4. [FileLister.FileLister.pathTpl](extras/filelister/filelister/pathtpl)

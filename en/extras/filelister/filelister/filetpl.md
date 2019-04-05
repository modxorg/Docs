---
title: "fileTpl"
_old_id: "847"
_old_uri: "revo/filelister/filelister.filelister/filelister.filelister.filetpl"
---

## FileLister's fileTpl Chunk

This is the Chunk displayed with the &fileTpl property on the [FileLister](/extras/revo/filelister/filelister.filelister "FileLister.FileLister") snippet.

## Default Value

``` php 
<tr class="[[+cls]]">
    <td class="feo-filename">[[+link]]</td>
    <td class="feo-filesize">[[+filesize]]</td>
    <td class="feo-lastmod">[[+lastmod:date=`[[+dateFormat]]`]]</td>
</tr>
```

## Available Placeholders

| Name | Description |
|------|-------------|
| link | The link to view or download the file. |
| filename | The basename of the file. |
| filesize | The filesize, formatted. |
| bytesize | The size in bytes of the file. |
| extension | The file extension of the file. |
| lastmod | The last modified date, in timestamp format. |
| dateFormat | The dateFormat string passed into the [FileLister](/extras/revo/filelister/filelister.filelister "FileLister.FileLister") snippet. |
| path | The absolute path to the file. |
| relativePath | The relative path to the 'path' property passed into the [FileLister](/extras/revo/filelister/filelister.filelister "FileLister.FileLister") snippet. |
| navKey | The navKey being used for link generation. |

## See Also

1. [FileLister.FileLister](/extras/revo/filelister/filelister.filelister)
  1. [FileLister.FileLister.directoryTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.directorytpl)
  2. [FileLister.FileLister.fileLinkTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filelinktpl)
  3. [FileLister.FileLister.fileTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filetpl)
  4. [FileLister.FileLister.pathTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.pathtpl)
2. [FileLister.Roadmap](/extras/revo/filelister/filelister.roadmap)
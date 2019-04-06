---
title: "directoryTpl"
_old_id: "845"
_old_uri: "revo/filelister/filelister.filelister/filelister.filelister.directorytpl"
---

## FileLister's directoryTpl Chunk

This is the Chunk displayed with the &directoryTpl property on the [FileLister](extras/filelister/filelister.filelister "FileLister.FileLister") snippet. Used for directories that are listed.

## Default Value

``` php 
<tr class="[[+cls]]">
    <td colspan="3" class="feo-dirname">[[+link]]</td>
</tr>
```

## Available Placeholders

| Name         | Description                                                                                                                                      |
| ------------ | ------------------------------------------------------------------------------------------------------------------------------------------------ |
| link         | The link to browse the directory.                                                                                                                |
| filename     | The basename of the directory.                                                                                                                   |
| path         | The absolute path to the directory.                                                                                                              |
| relativePath | The relative path to the 'path' property passed into the [FileLister](extras/filelister/filelister.filelister "FileLister.FileLister") snippet. |
| navKey       | The navKey being used for link generation.                                                                                                       |

## See Also

1. [FileLister.FileLister](extras/filelister/filelister.filelister)
  1. [FileLister.FileLister.directoryTpl](extras/filelister/filelister.filelister/filelister.filelister.directorytpl)
  2. [FileLister.FileLister.fileLinkTpl](extras/filelister/filelister.filelister/filelister.filelister.filelinktpl)
  3. [FileLister.FileLister.fileTpl](extras/filelister/filelister.filelister/filelister.filelister.filetpl)
  4. [FileLister.FileLister.pathTpl](extras/filelister/filelister.filelister/filelister.filelister.pathtpl)
2. [FileLister.Roadmap](extras/filelister/filelister.roadmap)
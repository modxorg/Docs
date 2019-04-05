---
title: "pathTpl"
_old_id: "848"
_old_uri: "revo/filelister/filelister.filelister/filelister.filelister.pathtpl"
---

## FileLister's pathTpl Chunk

This is the Chunk displayed with the &pathTpl property on the [FileLister](/extras/revo/filelister/filelister.filelister "FileLister.FileLister") snippet.

## Default Value

``` php 
<a href="[[~[[*id]]]]?[[+navKey]]=[[+key]]">[[+dir]]</a>[[+separator]]
```

## Available Placeholders

| Name | Description |
|------|-------------|
| dir | The directory name. |
| key | The generated hash key for navigation. |
| navKey | The navKey being used for link generation. |
| separator | The passed in separator between directories. |

## See Also

1. [FileLister.FileLister](/extras/revo/filelister/filelister.filelister)
  1. [FileLister.FileLister.directoryTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.directorytpl)
  2. [FileLister.FileLister.fileLinkTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filelinktpl)
  3. [FileLister.FileLister.fileTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filetpl)
  4. [FileLister.FileLister.pathTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.pathtpl)
2. [FileLister.Roadmap](/extras/revo/filelister/filelister.roadmap)
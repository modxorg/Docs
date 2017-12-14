---
title: "FileLister.FileLister.directoryTpl"
_old_id: "845"
_old_uri: "revo/filelister/filelister.filelister/filelister.filelister.directorytpl"
---

FileLister's directoryTpl Chunk
-------------------------------

This is the Chunk displayed with the &directoryTpl property on the [FileLister](/extras/revo/filelister/filelister.filelister "FileLister.FileLister") snippet. Used for directories that are listed.

Default Value
-------------

```
<pre class="brush: php">
<tr class="[[+cls]]">
    <td colspan="3" class="feo-dirname">[[+link]]</td>
</tr>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>link</td><td>The link to browse the directory.</td></tr><tr><td>filename</td><td>The basename of the directory.</td></tr><tr><td>path</td><td>The absolute path to the directory.</td></tr><tr><td>relativePath</td><td>The relative path to the 'path' property passed into the [FileLister](/extras/revo/filelister/filelister.filelister "FileLister.FileLister") snippet.</td></tr><tr><td>navKey</td><td>The navKey being used for link generation.</td></tr></tbody></table>See Also
--------

1. [FileLister.FileLister](/extras/revo/filelister/filelister.filelister)
  1. [FileLister.FileLister.directoryTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.directorytpl)
  2. [FileLister.FileLister.fileLinkTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filelinktpl)
  3. [FileLister.FileLister.fileTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filetpl)
  4. [FileLister.FileLister.pathTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.pathtpl)
2. [FileLister.Roadmap](/extras/revo/filelister/filelister.roadmap)
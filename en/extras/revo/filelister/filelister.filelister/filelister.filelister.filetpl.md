---
title: "FileLister.FileLister.fileTpl"
_old_id: "847"
_old_uri: "revo/filelister/filelister.filelister/filelister.filelister.filetpl"
---

FileLister's fileTpl Chunk
--------------------------

This is the Chunk displayed with the &fileTpl property on the [FileLister](/extras/revo/filelister/filelister.filelister "FileLister.FileLister") snippet.

Default Value
-------------

```
<pre class="brush: php">
<tr class="[[+cls]]">
    <td class="feo-filename">[[+link]]</td>
    <td class="feo-filesize">[[+filesize]]</td>
    <td class="feo-lastmod">[[+lastmod:date=`[[+dateFormat]]`]]</td>
</tr>

```Available Placeholders
----------------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>link</td><td>The link to view or download the file.</td></tr><tr><td>filename</td><td>The basename of the file.</td></tr><tr><td>filesize</td><td>The filesize, formatted.</td></tr><tr><td>bytesize</td><td>The size in bytes of the file.</td></tr><tr><td>extension</td><td>The file extension of the file.</td></tr><tr><td>lastmod</td><td>The last modified date, in timestamp format.</td></tr><tr><td>dateFormat</td><td>The dateFormat string passed into the [FileLister](/extras/revo/filelister/filelister.filelister "FileLister.FileLister") snippet.</td></tr><tr><td>path</td><td>The absolute path to the file.</td></tr><tr><td>relativePath</td><td>The relative path to the 'path' property passed into the [FileLister](/extras/revo/filelister/filelister.filelister "FileLister.FileLister") snippet.</td></tr><tr><td>navKey</td><td>The navKey being used for link generation.</td></tr></tbody></table>See Also
--------

1. [FileLister.FileLister](/extras/revo/filelister/filelister.filelister)
  1. [FileLister.FileLister.directoryTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.directorytpl)
  2. [FileLister.FileLister.fileLinkTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filelinktpl)
  3. [FileLister.FileLister.fileTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filetpl)
  4. [FileLister.FileLister.pathTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.pathtpl)
2. [FileLister.Roadmap](/extras/revo/filelister/filelister.roadmap)
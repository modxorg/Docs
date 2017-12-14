---
title: "FileLister.FileLister"
_old_id: "844"
_old_uri: "revo/filelister/filelister.filelister"
---

FileLister Snippet
------------------

This snippet displays a list of files and/or directories within a given path.

Usage
-----

Simply place the snippet anywhere and pass in a path:

```
<pre class="brush: php">[[FileLister? &path=`assets/downloads/`]]

```Properties
----------

<table><tbody><tr><th>Name</th> <th>Description</th> <th>Default Value</th> </tr><tr><td>path</td> <td>The path to begin browsing in.</td> <td> </td> </tr><tr><td>fileTpl</td> <td>The chunk for each file listing.</td> <td>feoFile</td> </tr><tr><td>directoryTpl</td> <td>The chunk for each directory listing.</td> <td>feoDirectory</td> </tr><tr><td>fileLinkTpl</td> <td>The chunk for the links for each listing.</td> <td>feoFileLink</td> </tr><tr><td>dateFormat</td> <td>A PHP date format for the last modified field.</td> <td>%b %d, %Y</td> </tr><tr><td>outputSeparator</td> <td>A separator that is appended to each listing.</td> <td>\\n</td> </tr><tr><td>skipDirs</td> <td>A comma-separated list of directory names to always skip.</td> <td>.svn, .git, .metadata, .tmp, .DS\_Store, \_notes</td> </tr><tr><td>placeholderPrefix</td> <td>The prefix to append to all global placeholders set by the snippet.</td> <td>filelister</td> </tr><tr><td>pathSeparator</td> <td>The separator between items generated in the +path placeholder.</td> <td>/</td> </tr><tr><td>pathTpl</td> <td>The chunk for each item in the +path placeholder.</td> <td>feoPathLink</td> </tr><tr><td>showFiles</td> <td>If false, will hide any files from the listing.</td> <td>1</td> </tr><tr><td>showDirectories</td> <td>If false, will hide any directories from the listing.</td> <td>1</td> </tr><tr><td>showExt</td> <td>A comma-separated list of extensions (omit the .) to restrict output of files to. If blank, all files will be shown. If any are specified, only files with those extensions will be shown.</td> <td> </td> </tr><tr><td>sortBy</td> <td>The metric to sort by for each file. Can be 'extension', 'lastmod', 'bytesize' or 'filename'.  
</td> <td>filename</td> </tr><tr><td>sortDir</td> <td>The direction to sort by for each file.</td> <td>ASC</td> </tr><tr><td>allowDownload</td> <td>If false, will disable viewing and downloads of any files.</td> <td>1</td> </tr><tr><td>requireAuthDownload</td> <td>If true, will require users be logged in to view or download a file.</td> <td>0</td> </tr><tr><td>allowDownloadGroups</td> <td>A comma-separated list that, if set, will restrict file viewing/downloading to users in the specified groups.</td> <td> </td> </tr><tr><td>toPlaceholder</td> <td>If set, will set the output to a placeholder with the specified name rather than directly outputting it.</td> <td> </td> </tr><tr><td>navKey</td> <td>The REQUEST navigation key used for the browsing.</td> <td>fd</td> </tr><tr><td>homePathName</td> <td>If you want to specify a custom name for the root when browsing, do so here.</td> <td> </td> </tr><tr><td>limit</td> <td>Optional. Limit the number of records that show. Use 0 for showing all.</td> <td>0</td> </tr><tr><td>cls</td> <td>The CSS class to use for non-alternate rows.</td> <td>feo-row</td> </tr><tr><td>altCls</td> <td>The CSS class to use for alternate rows.</td> <td>feo-alt-row</td> </tr><tr><td>firstCls</td> <td>The CSS class to use for the first row.</td> <td>feo-first-row</td> </tr><tr><td>lastCls</td> <td>The CSS class to use for the last row.</td> <td>feo-last-row</td> </tr><tr><td>useGeolocation</td> <td>If true, will use the [ipinfodb](http://ipinfodb.com) Geolocation service for downloads. You must have the filelister.ipinfodb\_api\_key setting set to your API key for this to work.</td> <td>1</td></tr></tbody></table>FileLister Chunks
-----------------

There are 4 chunks that are processed in FileLister. Their corresponding parameters are:

- [fileTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filetpl "FileLister.FileLister.fileTpl") - The Chunk to use for each file listed.
- [directoryTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.directorytpl "FileLister.FileLister.directoryTpl") - The Chunk to use for each directory listed.
- [fileLinkTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filelinktpl "FileLister.FileLister.fileLinkTpl") - The Chunk to use for each link made for each item.
- [pathTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.pathtpl "FileLister.FileLister.pathTpl") - The chunk for each item in the path placeholder.

Examples
--------

Display a list of only files within the 'assets/downloads/' path:

```
<pre class="brush: php">[[!FileLister? &path=`assets/downloads` &showDirectories=`0`]]

```See Also
--------

1. [FileLister.FileLister](/extras/revo/filelister/filelister.filelister)
  1. [FileLister.FileLister.directoryTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.directorytpl)
  2. [FileLister.FileLister.fileLinkTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filelinktpl)
  3. [FileLister.FileLister.fileTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.filetpl)
  4. [FileLister.FileLister.pathTpl](/extras/revo/filelister/filelister.filelister/filelister.filelister.pathtpl)
2. [FileLister.Roadmap](/extras/revo/filelister/filelister.roadmap)
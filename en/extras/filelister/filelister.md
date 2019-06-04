---
title: "FileLister"
_old_id: "844"
_old_uri: "revo/filelister/filelister.filelister"
---

## FileLister Snippet

This snippet displays a list of files and/or directories within a given path.

## Usage

Simply place the snippet anywhere and pass in a path:

``` php
[[FileLister? &path=`assets/downloads/`]]
```

## Properties

| Name                | Description                                                                                                                                                                                | Default Value                                    |
| ------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------ |
| path                | The path to begin browsing in.                                                                                                                                                             |                                                  |
| fileTpl             | The chunk for each file listing.                                                                                                                                                           | feoFile                                          |
| directoryTpl        | The chunk for each directory listing.                                                                                                                                                      | feoDirectory                                     |
| fileLinkTpl         | The chunk for the links for each listing.                                                                                                                                                  | feoFileLink                                      |
| dateFormat          | A PHP date format for the last modified field.                                                                                                                                             | %b %d, %Y                                        |
| outputSeparator     | A separator that is appended to each listing.                                                                                                                                              | \\n                                              |
| skipDirs            | A comma-separated list of directory names to always skip.                                                                                                                                  | .svn, .git, .metadata, .tmp, .DS\_Store, \_notes |
| placeholderPrefix   | The prefix to append to all global placeholders set by the snippet.                                                                                                                        | filelister                                       |
| pathSeparator       | The separator between items generated in the +path placeholder.                                                                                                                            | /                                                |
| pathTpl             | The chunk for each item in the +path placeholder.                                                                                                                                          | feoPathLink                                      |
| showFiles           | If false, will hide any files from the listing.                                                                                                                                            | 1                                                |
| showDirectories     | If false, will hide any directories from the listing.                                                                                                                                      | 1                                                |
| showExt             | A comma-separated list of extensions (omit the .) to restrict output of files to. If blank, all files will be shown. If any are specified, only files with those extensions will be shown. |                                                  |
| sortBy              | The metric to sort by for each file. Can be 'extension', 'lastmod', 'bytesize' or 'filename'.                                                                                              | filename                                         |
| sortDir             | The direction to sort by for each file.                                                                                                                                                    | ASC                                              |
| allowDownload       | If false, will disable viewing and downloads of any files.                                                                                                                                 | 1                                                |
| requireAuthDownload | If true, will require users be logged in to view or download a file.                                                                                                                       | 0                                                |
| allowDownloadGroups | A comma-separated list that, if set, will restrict file viewing/downloading to users in the specified groups.                                                                              |                                                  |
| toPlaceholder       | If set, will set the output to a placeholder with the specified name rather than directly outputting it.                                                                                   |                                                  |
| navKey              | The REQUEST navigation key used for the browsing.                                                                                                                                          | fd                                               |
| homePathName        | If you want to specify a custom name for the root when browsing, do so here.                                                                                                               |                                                  |
| limit               | Optional. Limit the number of records that show. Use 0 for showing all.                                                                                                                    | 0                                                |
| cls                 | The CSS class to use for non-alternate rows.                                                                                                                                               | feo-row                                          |
| altCls              | The CSS class to use for alternate rows.                                                                                                                                                   | feo-alt-row                                      |
| firstCls            | The CSS class to use for the first row.                                                                                                                                                    | feo-first-row                                    |
| lastCls             | The CSS class to use for the last row.                                                                                                                                                     | feo-last-row                                     |
| useGeolocation      | If true, will use the [ipinfodb](http://ipinfodb.com) Geolocation service for downloads. You must have the filelister.ipinfodb\_api\_key setting set to your API key for this to work.     | 1                                                |

## FileLister Chunks

There are 4 chunks that are processed in FileLister. Their corresponding parameters are:

- [fileTpl](extras/filelister/filelister/filetpl "FileLister.FileLister.fileTpl") - The Chunk to use for each file listed.
- [directoryTpl](extras/filelister/filelister/directorytpl "FileLister.FileLister.directoryTpl") - The Chunk to use for each directory listed.
- [fileLinkTpl](extras/filelister/filelister/filelinktpl "FileLister.FileLister.fileLinkTpl") - The Chunk to use for each link made for each item.
- [pathTpl](extras/filelister/filelister/pathtpl "FileLister.FileLister.pathTpl") - The chunk for each item in the path placeholder.

## Examples

Display a list of only files within the 'assets/downloads/' path:

``` php
[[!FileLister? &path=`assets/downloads` &showDirectories=`0`]]
```

## See Also

1. [FileLister.FileLister](extras/filelister)
     1. [FileLister.FileLister.directoryTpl](extras/filelister/filelister/directorytpl)
     2. [FileLister.FileLister.fileLinkTpl](extras/filelister/filelister/filelinktpl)
     3. [FileLister.FileLister.fileTpl](extras/filelister/filelister/filetpl)
     4. [FileLister.FileLister.pathTpl](extras/filelister/filelister/pathtpl)
2. [FileLister.Roadmap](extras/filelister/filelister.roadmap)

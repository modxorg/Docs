---
title: "Archivist"
_old_id: "776"
_old_uri: "revo/archivist/archivist.archivist"
---

## Archivist Snippet

 This snippet displays monthly or yearly archive links.

## Usage

 Simply place the snippet wherever you would like to display archive listings in, the parents to grab archives from, and a target resource to load the archives using the [getArchives](/extras/revo/archivist/archivist.getarchives "Archivist.getArchives") snippet.

 ``` php 
[[!Archivist? &target=`123` &parents=`4,12,33`]]
```

## Available Properties

 | Name          | Description                                                                                                                                              | Default      |
 | ------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------ |
 | tpl           | The chunk that will be used to display each month/year result.                                                                                           | row          |
 | target        | The Resource that the getArchives snippet is called on, that will display the results of the archive filter.                                             |              |
 | parents       | Comma-delimited list of ids serving as parents.                                                                                                          |              |
 | depth         | Integer value indicating depth to search for resources from each parent.                                                                                 | 10           |
 | sortBy        | The field to sort and group results by.                                                                                                                  | publishedon  |
 | sortDir       | Order which to sort by. Defaults to DESC.                                                                                                                | DESC         |
 | limit         | Limits the number of resources returned.                                                                                                                 | 10           |
 | start         | Optional. An offset of resources returned by the criteria to skip.                                                                                       | 0            |
 | useMonth      | If 1, will use the month in the archive list.                                                                                                            | 1            |
 | useDay        | If 1, will use the day in the archive list.                                                                                                              | 0            |
 | dateFormat    | Optional. The date format, according to MySQL DATE\_FORMAT() syntax, for each row. If blank, Archivist will calculate this automatically.                |              |
 | useFurls      | If true, will generate links in pretty Friendly URL format.                                                                                              | 1            |
 | extraParams   | Optional. If specified, will attach this to the URL of each row.                                                                                         |              |
 | cls           | A CSS class to add to each row.                                                                                                                          | arc-row      |
 | altCls        | A CSS class to add to each alternate row.                                                                                                                | arc-row-alt  |
 | firstCls      | Optional. A CSS class to add to the first row. If empty will ignore.                                                                                     |              |
 | lastCls       | Optional. A CSS class to add to the last row. If empty will ignore.                                                                                      |              |
 | filterPrefix  | The prefix to use for GET parameters with the Archivist links. Make sure this is the same as the filterPrefix parameter on the getArchives snippet call. | arc\_        |
 | toPlaceholder | If set, will set the output of this snippet to this placeholder rather than output it.                                                                   |              |
 | setLocale     | If true, Archivist will run the setlocale function with your cultureKey setting if your cultureKey is not "en".                                          | true         |
 | grSnippet     | The name of the snippet used to list results.                                                                                                            | getResources |

## Archivist Chunks

 There is 1 chunk that is processed in Archivist. Its corresponding Archivist parameter is:

- [tpl](/extras/revo/archivist/archivist.archivist/archivist.archivist.tpl "Archivist.Archivist.tpl") - The Chunk to use for each result displayed.

## Examples

 Display a list of months for archives for Resources under IDs 2, 4 & 6, and when clicked, go to page 123:

 ``` php 
[[!Archivist? &target=`123` &parents=`2,4,6`]]

```

## See Also

1. [Archivist.Archivist](/extras/revo/archivist/archivist.archivist)
  1. [Archivist.Archivist.tpl](/extras/revo/archivist/archivist.archivist/archivist.archivist.tpl)
2. [Archivist.ArchivistGrouper](/extras/revo/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](/extras/revo/archivist/archivist.getarchives)
  1. [Archivist.getArchives.tpl](/extras/revo/archivist/archivist.getarchives/archivist.getarchives.tpl)
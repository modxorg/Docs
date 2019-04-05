---
title: "tpl"
_old_id: "777"
_old_uri: "revo/archivist/archivist.archivist/archivist.archivist.tpl"
---

## Archivist's tpl Chunk

This is the Chunk displayed with the &tpl property on the [Archivist](/extras/revo/archivist/archivist.archivist "Archivist.Archivist") snippet.

## Default Value

``` php 
<li class="[[+cls]]">
    <a href="[[+url]]" title="[[+date]]">[[+date]]</a> ([[+count]])
</li>
```

## Available Placeholders

| Name              | Description                                                                  |
| ----------------- | ---------------------------------------------------------------------------- |
| url               | The URL that will go to the appropriate archive.                             |
| cls               | The CSS class to use, specified as a property in the Archivist snippet call. |
| date              | The formatted time span that is being archived.                              |
| count             | The number of Resources in the 'date'.                                       |
| month             | The number month. (01,07,11,etc)                                             |
| month\_name       | The name of the month.                                                       |
| month\_name\_abbr | The abbreviated name of the month.                                           |
| year              | The 4-digit year.                                                            |
| day               | The numeric of the day (01,24,31,etc)                                        |
| day\_formatted    | The day, with a postfix 'th', 'rd' or 'nd'. (1st, 2nd, 3rd)                  |
| weekday           | The name of the weekday.                                                     |
| weekday\_idx      | The index of the weekday.                                                    |

## See Also

1. [Archivist.Archivist](/extras/revo/archivist/archivist.archivist)
  1. [Archivist.Archivist.tpl](/extras/revo/archivist/archivist.archivist/archivist.archivist.tpl)
2. [Archivist.ArchivistGrouper](/extras/revo/archivist/archivist.archivistgrouper)
3. [Archivist.getArchives](/extras/revo/archivist/archivist.getarchives)
  1. [Archivist.getArchives.tpl](/extras/revo/archivist/archivist.getarchives/archivist.getarchives.tpl)
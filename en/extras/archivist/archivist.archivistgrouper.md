---
title: "ArchivistGrouper"
_old_id: "778"
_old_uri: "revo/archivist/archivist.archivistgrouper"
---

# ArchivistGrouper

The [Articles](/extras/revo/articles "Articles") addon 1.6.1 came with the Archivist addon 1.2.3, so I suppose this ArchivistGrouper snippet is now part of [Archivist](/extras/revo/archivist "Archivist"). No documentation yet from its creator, but I found the available properties in the snippet.

The descriptions in the table are just a guess!!! Someone with more experience or the creator should confirm or adjust these!!

## Usage

Simply place the snippet wherever you would like to display archive listings in, the parents to grab archives from.

``` php 
[[!ArchivistGrouper? &parents=`12`]]
```

## Available Properties

| Name | Description | Default |
|------|-------------|---------|
| mode | Choose between month and year | month |
| itemTpl | The chunk that will be used to display each item within a group |  |
| parents | Comma-delimited list of ids serving as parents. |  |
| target | The Resource that the getArchives snippet is called on, that will display the results of the archive filter. |  |
| depth | Integer value indicating depth to search for resources from each parent. | 10 |
| where |  |  |
| hideContainers |  | true |
| sortBy | The field to sort and group results by. | publishedon |
| sortDir | Order which to sort by. Defaults to DESC. | DESC |
| dateFormat | The date format, according to MySQL DATE\_FORMAT() syntax, for each row. If blank, ArchivistGrouper will calculate this automatically. |  |
| limitGroups | Limits the number of groups returned. | 12 |
| limitItems | Limits the number of items returned. 0 means no limit?? | 0 |
| resourceSeparator |  | \\n |
| groupSeparator |  | \\n |
| filterPrefix | The prefix to use for GET parameters with the Archivist links. Make sure this is the same as the filterPrefix parameter on the getArchives snippet call. | arc\_ |
| useFurls | If true, will generate links in pretty Friendly URL format. | true |
| persistGetParams |  | false |
| extraParams |  |  |
| cls | A CSS class to add to each row. | arc-resource-row |
| altCls | A CSS class to add to each alternate row. | arc-resource-row-alt |
| setLocale | If true, Archivist will run the setlocale function with your cultureKey setting if your cultureKey is not "en". | true |
| groupTpl | The chunk that will be used to display each month/year result. | yearContainer (when property mode=`year`) 
monthContainer (when property mode=`month`) |

Almost all of the descriptions are the same properties as mentioned on the [Archivist page](/extras/revo/archivist/archivist.archivist "Archivist.Archivist").

## Chunks

If no templates are given, the defaults are used. As it got me puzzled how to create my own template for the groups, I dived into the source and found this template that is used as monthContainer:

``` php 
<li><a href="[[+url]]">[[+month_name]] [[+year]]</a>
<ul>
[[+resources]]
</ul>
```

Notice the placeholder **\[\[+resources\]\]** that passes on the results to the itemTpl.

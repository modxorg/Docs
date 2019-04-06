---
title: "tagLister"
_old_id: "1015"
_old_uri: "revo/taglister/taglister.taglister"
---

## tagLister Snippet 

 This snippet displays a list of the most commonly used tags on your site.

## Usage

 Simply place the snippet anywhere you want to show a list of commonly-used tags, and pass the ID or name of the TV and the target Resource ID you want the links to go to:

``` php
[[!tagLister? &tv=`tags` &target=`123`]]
```

## Properties

| Name          | Description                                                                            | Default Value |
| ------------- | -------------------------------------------------------------------------------------- | ------------- |
| tpl           | Name of a Chunk that will be used for each result.                                     | tag           |
| tv            | The name or ID of the TV being used for tags.                                          | tags          |
| tvDelimiter   | The delimiter being used between tags in the TV. Usually a comma, sometimes a space.   | ,             |
| target        | The target Resource to point the tag links to.                                         | 1             |
| tagVar        | The request parameter used for outputting the tag in the default tpl.                  | tag           |
| tagKeyVar     | The request parameter used for outputting the key in the default tpl.                  |               |
| sortBy        | Field to sort by. Can be either tag or count.                                          | count         |
| sortDir       | Order which to sort by.                                                                | ASC           |
| limit         | Limits the number of tags returned.                                                    | 10            |
| cls           | A CSS class to add to each row.                                                        | tl-tag        |
| all           | Whether to show 'All tags' link.                                                       | false         |
| allTpl        | Name of a Chunk that will be used for the 'All Tags' link                              | all           |
| altCls        | A CSS class to add to each alternate row.                                              | tl-tag-alt    |
| firstCls      | Optional. A CSS class to add to the first row. If empty will ignore.                   |               |
| lastCls       | Optional. A CSS class to add to the last row. If empty will ignore.                    |               |
| activeCls     | Optional. A CSS class to add to the active row. Will be ignored if empty.              |               |
| toPlaceholder | If set, will set the output of this snippet to this placeholder rather than output it. |               |
| toLower       | If set to 1/true the tags will be changed to lowercase text.                           | false         |
| weights       |                                                                                        | 0             |
| weightCls     |                                                                                        |               |
| parents       | Comma delimited list of parents to use to limit the search for tags to.                |               |
| depth         | Depth of parents to search in.                                                         | 10            |

## tagLister Chunks

 There are 2 chunks that are processed in tagLister. Their corresponding parameters are:

- [tpl](/extras/taglister/taglister.taglister/taglister.taglister.tpl "tagLister.tagLister.tpl") - The Chunk to use for each tag listed.
- [allTpl](/extras/taglister/taglister.taglister/taglister.taglister.all "tagLister.tagLister.all") - The Chunk to use for the 'All Tags' link.

## Examples

 Display a list of the top 5 tags for the 'tags' TV, and link to Resource ID 123:

``` php
[[!tagLister? &tv=`tags` &limit=`5` &target=`123`]]
```

## See Also

1. [tagLister.getResourcesTag](/extras/taglister/taglister.getresourcestag)
2. [tagLister.tagLister](/extras/taglister/taglister.taglister)
     1. [tagLister.tagLister.all](/extras/taglister/taglister.taglister/taglister.taglister.all)
     2. [tagLister.tagLister.tpl](/extras/taglister/taglister.taglister/taglister.taglister.tpl)
3. [tagLister.tolinks](/extras/taglister/taglister.tolinks)
     1. [tagLister.tolinks.tpl](/extras/taglister/taglister.tolinks/taglister.tolinks.tpl)
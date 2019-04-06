---
title: "Rowboat"
_old_id: "976"
_old_uri: "revo/rowboat/rowboat.rowboat"
---

## The Rowboat Snippet

This snippet iterates across rows for any database table.

## Usage

Display the first 10 Doodles in the modx\_doodles table, sorted by name:

``` php
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &limit=`10`
   &sortBy=`name`
]]
```

Using the following Chunk, "myDoodle":

``` php
<li id="doodle[[+id]]"><strong>[[+name]]</strong> - [[+description]]</li>
```

## Available Properties

| Name              | Description                                                                                                                              | Default  |
| ----------------- | ---------------------------------------------------------------------------------------------------------------------------------------- | -------- |
| tpl               | The Chunk to use for each row. If empty, will output an array of placeholders that are available.                                        |          |
| table             | Required. The table to grab records from.                                                                                                |          |
| columns           | A JSON object of columns and aliases for those columns to grab for the row. If not set, will grab all columns in the table.              | \*       |
| where             | A JSON object for a where statement.                                                                                                     |          |
| sortBy            | If set, will sort by this field.                                                                                                         |
| sortDir           | The direction to sort by.                                                                                                                | ASC      |
| limit             | The number of rows to limit per call. Defaults to 10. Set to 0 to show all.                                                              | 10       |
| offset            | The start index to begin with when limiting.                                                                                             | 0        |
| cacheResults      | If set to 1, will cache the results of the specific query.                                                                               | 1        |
| cacheTime         | If cacheResults is set to 1, the number of seconds to cache the query for.                                                               | 3600     |
| placeholderPrefix | The prefix to use when setting global placeholders, such as total.                                                                       | rowboat. |
| outputSeparator   | The separator between each user record.                                                                                                  |          |
| toPlaceholder     | Optional. If set, will set the output to this placeholder and return empty.                                                              |          |
| debug             | Optional. If set to 1, will output a table of information about the generated query and results. Always leave at 0 for production sites. | 0        |

## tpl Chunk Properties

In your &tpl Chunk, you will have all the columns that you selected as properties, as well as:

| Name    | Description                                                             |
| ------- | ----------------------------------------------------------------------- |
| \_idx   | The index of this row.                                                  |
| \_alt   | 1 if is an even row, 0 if odd.                                          |
| \_first | If this row is the first of this paged result set, then this will be 1. |
| \_last  | If this row is the last of this paged result set, then this will be 1.  |

## Examples

Grab top 10 Doodles, sorted by name, from modx\_doodles that have "Test" in their name:

``` php
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &limit=`10`
   &where=`{"name:LIKE":"%Test%"}`
   &sortBy=`name`
]]
```

Grab only the id, name and description (with description aliased as "desc") columns from the above example: (note that non-aliased columns need a blank "" for the alias)

``` php 
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &columns=`{"id":"","name":"","description":"desc"}`
   &limit=`10`
   &where=`{"name:LIKE":"%Test%"}`
   &sortBy=`name`
]]
```

Grab 10 Doodles where description isn't empty **or** the name is "Test":

``` php 
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &limit=`10`
   &where=`{"description:!=":"","OR:name":"Test"}`
   &sortBy=`name`
]]
```

More to come shortly.

### Using [getPage](extras/getpage "getPage") with Rowboat

It's pretty simple - just make sure to set the totalVar property in your getPage call as "rowboat.total", and have cache=`0` in the getPage call. For example, this will grab all doodles where the name contains "Fun", paginate them to 10 per page, and add page navigation:

``` php 
[[!getPage?
   &element=`Rowboat`
   &table=`modx_doodles`
   &sortBy=`name`
   &where=`{"name:LIKE":"%Fun%"}`
   &totalVar=`rowboat.total`
   &tpl=`myDoodle`
   &cache=`0`
   &limit=`10`
]]
<div class="paging">
<ul class="pageList">
  [[!+page.nav]]
</ul>
</div>
```

## Gotchas

Be careful about the &columns argument: if you list a column that does not exist, the RowBoat Snippet call will return no results.

## See Also

1. [Rowboat.Rowboat](extras/rowboat/rowboat.rowboat)
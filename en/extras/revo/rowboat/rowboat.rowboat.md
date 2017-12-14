---
title: "Rowboat.Rowboat"
_old_id: "976"
_old_uri: "revo/rowboat/rowboat.rowboat"
---

<div>- [The Rowboat Snippet](#Rowboat.Rowboat-TheRowboatSnippet)
- [Usage](#Rowboat.Rowboat-Usage)
- [Available Properties](#Rowboat.Rowboat-AvailableProperties)
- [tpl Chunk Properties](#Rowboat.Rowboat-tplChunkProperties)
- [Examples](#Rowboat.Rowboat-Examples)
  - [Using getPage with Rowboat](#Rowboat.Rowboat-UsinggetPagewithRowboat)
- [Gotchas](#Rowboat.Rowboat-Gotchas)
- [See Also](#Rowboat.Rowboat-SeeAlso)

</div>The Rowboat Snippet
-------------------

This snippet iterates across rows for any database table.

Usage
-----

Display the first 10 Doodles in the modx\_doodles table, sorted by name:

```
<pre class="brush: php">
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &limit=`10`
   &sortBy=`name`
]]

```Using the following Chunk, "myDoodle":

```
<pre class="brush: php">
<li id="doodle[[+id]]"><strong>[[+name]]</strong> - [[+description]]</li>

```Available Properties
--------------------

<table id="TBL1376497247028"><tbody><tr><th>Name</th><th>Description</th><th>Default</th></tr><tr><td>tpl</td><td>The Chunk to use for each row. If empty, will output an array of placeholders that are available.</td><td> </td></tr><tr><td>table</td><td>Required. The table to grab records from.</td><td> </td></tr><tr><td>columns</td><td>A JSON object of columns and aliases for those columns to grab for the row. If not set, will grab all columns in the table.</td><td>\*</td></tr><tr><td>where</td><td>A JSON object for a where statement.</td><td> </td></tr><tr><td>sortBy</td><td>If set, will sort by this field.</td></tr><tr><td>sortDir</td><td>The direction to sort by.</td><td>ASC</td></tr><tr><td>limit</td><td>The number of rows to limit per call. Defaults to 10. Set to 0 to show all.</td><td>10</td></tr><tr><td>offset</td><td>The start index to begin with when limiting.</td><td>0</td></tr><tr><td>cacheResults</td><td>If set to 1, will cache the results of the specific query.</td><td>1</td></tr><tr><td>cacheTime</td><td>If cacheResults is set to 1, the number of seconds to cache the query for.</td><td>3600</td></tr><tr><td>placeholderPrefix</td><td>The prefix to use when setting global placeholders, such as total.</td><td>rowboat.</td></tr><tr><td>outputSeparator</td><td>The separator between each user record.</td><td> </td></tr><tr><td>toPlaceholder</td><td>Optional. If set, will set the output to this placeholder and return empty.</td><td> </td></tr><tr><td>debug</td><td>Optional. If set to 1, will output a table of information about the generated query and results. Always leave at 0 for production sites.</td><td>0</td></tr></tbody></table>tpl Chunk Properties
--------------------

In your &tpl Chunk, you will have all the columns that you selected as properties, as well as:

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>\_idx</td><td>The index of this row.</td></tr><tr><td>\_alt</td><td>1 if is an even row, 0 if odd.</td></tr><tr><td>\_first</td><td>If this row is the first of this paged result set, then this will be 1.</td></tr><tr><td>\_last</td><td>If this row is the last of this paged result set, then this will be 1.</td></tr></tbody></table>Examples
--------

Grab top 10 Doodles, sorted by name, from modx\_doodles that have "Test" in their name:

```
<pre class="brush: php">
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &limit=`10`
   &where=`{"name:LIKE":"%Test%"}`
   &sortBy=`name`
]]

```Grab only the id, name and description (with description aliased as "desc") columns from the above example: (note that non-aliased columns need a blank "" for the alias)

```
<pre class="brush: php">
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &columns=`{"id":"","name":"","description":"desc"}`
   &limit=`10`
   &where=`{"name:LIKE":"%Test%"}`
   &sortBy=`name`
]]

```Grab 10 Doodles where description isn't empty **or** the name is "Test":

```
<pre class="brush: php">
[[!Rowboat?
   &table=`modx_doodles`
   &tpl=`myDoodle`
   &limit=`10`
   &where=`{"description:!=":"","OR:name":"Test"}`
   &sortBy=`name`
]]

```<div class="note">More to come shortly.</div>### Using [getPage](/extras/revo/getpage "getPage") with Rowboat

It's pretty simple - just make sure to set the totalVar property in your getPage call as "rowboat.total", and have cache=`0` in the getPage call. For example, this will grab all doodles where the name contains "Fun", paginate them to 10 per page, and add page navigation:

```
<pre class="brush: php">
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

```Gotchas
-------

Be careful about the &columns argument: if you list a column that does not exist, the RowBoat Snippet call will return no results.

See Also
--------

1. [Rowboat.Rowboat](/extras/revo/rowboat/rowboat.rowboat)
---
title: "bdListings.bdTargets"
_old_id: "795"
_old_uri: "revo/bdlistings/bdlistings.bdtargets"
---

bdTargets is a simple snippet to output your target groups.

Snippet Properties
------------------

<table><tbody><tr><th>Property Name   
</th><th>Description   
</th><th>Default Value   
</th></tr><tr><td>limit   
</td><td>Limit the amount of results.   
</td><td>0   
</td></tr><tr><td>offset   
</td><td>Offset to start at.   
</td><td>0   
</td></tr><tr><td>sortby   
</td><td>Field to sort on. Can be sortorder, id or name.   
</td><td>sortorder   
</td></tr><tr><td>sortdir   
</td><td>Direction to sort on. Either asc or desc.   
</td><td>asc   
</td></tr><tr><td>rowSeparator   
</td><td>String to use between rowTpl items.   
</td><td>\\n   
</td></tr><tr><td>tplOuter   
</td><td>Chunkname to wrap the complete result set in.   
Default:   
  
```
<pre class="brush: php">
<h2>Target Groups</h2>
<ul>
    [[+wrapper]]
</ul>

```Placeholders to use:

- wrapper

</td><td> </td></tr><tr><td>tplRow   
</td><td>Chunk name to wrap individual target groups in.   
Default:   
  
```
<pre class="brush: php">
<li>[[+name]]</li>

```Placeholders to use:

- id
- name
- sortorder

</td><td> </td></tr></tbody></table>Examples
--------

Minimum call:

```
<pre class="brush: php">
[[!bdTargets]]

```Result (depending on your target group data):

```
<pre class="brush: php">
<h2>Target Groups</h2>
<ul>
  <li>Under 5</li>
  <li>From 15 to 18</li>
  <li>From 10 to 15</li>
  <li>From 5 to 10</li>
</ul>

```### Display as Select box

Snippet call:

```
<pre class="brush: php">
<label for="target">Target Group</label>
[[!bdTargets? &tplRow=`bdl.target.row` &tplOuter=`bdl.target.outer`]]

```bdl.target.row:

```
<pre class="brush: php">
<option value="[[+id]]">[[+name]]</option>

```bdl.target.outer:

```
<pre class="brush: php">
<select name="target">
  <option value="0">Choose a Target Group</option>
  [[+wrapper]]
</select>

```
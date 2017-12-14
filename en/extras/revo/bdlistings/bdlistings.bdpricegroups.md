---
title: "bdListings.bdPriceGroups"
_old_id: "793"
_old_uri: "revo/bdlistings/bdlistings.bdpricegroups"
---

bdPriceGroups is a simple snippet to output your price groups.

Snippet Properties
------------------

<table><tbody><tr><th>Property Name   
</th><th>Description   
</th><th>Default Value   
</th></tr><tr><td>limit   
</td><td>Limit the amount of results.   
</td><td>0   
</td></tr><tr><td>offset</td><td>Offset to start at.   
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
<h2>Price Groups</h2>
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
<li>[[+display]]</li>

```Placeholders to use:

- id
- display
- sortorder

</td><td> </td></tr></tbody></table>Examples
--------

Minimum call:

```
<pre class="brush: php">
[[!bdPriceGroups]]

```Result (depending on your price group data):

```
<pre class="brush: php">
<h2>Price Groups</h2>
<ul>
  <li>Cheap</li>
  <li>Good Value</li>
  <li>Exact Budget</li>
  <li>Too frick'n expensive</li>
</ul>

```### Display as Select box

Snippet call:

```
<pre class="brush: php">
<label for="pricegroup">Price Group</label>
[[!bdTargets? &tplRow=`bdl.pricegroup.row` &tplOuter=`bdl.pricegroup.outer`]]

```bdl.pricegroup.row:

```
<pre class="brush: php">
<option value="[[+id]]">[[+display]]</option>

```bdl.pricegroup.outer:

```
<pre class="brush: php">
<select name="pricegroup">
  <option value="0">Choose a Price Group</option>
  [[+wrapper]]
</select>

```
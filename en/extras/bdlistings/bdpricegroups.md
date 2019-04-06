---
title: "bdPriceGroups"
_old_id: "793"
_old_uri: "revo/bdlistings/bdlistings.bdpricegroups"
---

bdPriceGroups is a simple snippet to output your price groups.

## Snippet Properties

| Property Name | Description                                     | Default Value |
| ------------- | ----------------------------------------------- | ------------- |
| limit         | Limit the amount of results.                    | 0             |
| offset        | Offset to start at.                             | 0             |
| sortby        | Field to sort on. Can be sortorder, id or name. | sortorder     |
| sortdir       | Direction to sort on. Either asc or desc.       | asc           |
| rowSeparator  | String to use between rowTpl items.             | \\n           |
| tplOuter      | Chunkname to wrap the complete result set in.   |
Default: 

``` php
<h2>Price Groups</h2>
<ul>
    [[+wrapper]]
</ul>
```

Placeholders to use:

- wrapper |  |
| tplRow | Chunk name to wrap individual target groups in. 
Default: 

``` php
<li>[[+display]]</li>
```

Placeholders to use:

- id
- display
- sortorder |  |

## Examples

Minimum call:

``` php
[[!bdPriceGroups]]
```

Result (depending on your price group data):

``` php
<h2>Price Groups</h2>
<ul>
  <li>Cheap</li>
  <li>Good Value</li>
  <li>Exact Budget</li>
  <li>Too frick'n expensive</li>
</ul>
```

### Display as Select box

Snippet call:

``` php
<label for="pricegroup">Price Group</label>
[[!bdTargets? &tplRow=`bdl.pricegroup.row` &tplOuter=`bdl.pricegroup.outer`]]
```

bdl.pricegroup.row:

``` php
<option value="[[+id]]">[[+display]]</option>
```

bdl.pricegroup.outer:

``` php
<select name="pricegroup">
  <option value="0">Choose a Price Group</option>
  [[+wrapper]]
</select>
```

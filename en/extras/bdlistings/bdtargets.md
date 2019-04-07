---
title: "bdTargets"
_old_id: "795"
_old_uri: "revo/bdlistings/bdlistings.bdtargets"
---

bdTargets is a simple snippet to output your target groups.

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
<h2>Target Groups</h2>
<ul>
    [[+wrapper]]
</ul>
```

Placeholders to use:

- wrapper
`tplRow` - Chunk name to wrap individual target groups in. 
Default: 

``` php
<li>[[+name]]</li>
```

Placeholders to use:

- id
- name
- sortorder

## Examples

Minimum call:

``` php
[[!bdTargets]]
```

Result (depending on your target group data):

``` php
<h2>Target Groups</h2>
<ul>
  <li>Under 5</li>
  <li>From 15 to 18</li>
  <li>From 10 to 15</li>
  <li>From 5 to 10</li>
</ul>
```

### Display as Select box

Snippet call:

``` php
<label for="target">Target Group</label>
[[!bdTargets? &tplRow=`bdl.target.row` &tplOuter=`bdl.target.outer`]]
```

bdl.target.row:

``` php
<option value="[[+id]]">[[+name]]</option>
```

bdl.target.outer:

``` php
<select name="target">
  <option value="0">Choose a Target Group</option>
  [[+wrapper]]
</select>
```

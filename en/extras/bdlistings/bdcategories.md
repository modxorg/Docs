---
title: "bdCategories"
_old_id: "790"
_old_uri: "revo/bdlistings/bdlistings.bdcategories"
---

The bdCategories snippet can be used to output a dynamic category listing based on your categories in the bdListings component.

## Snippet Properties

| Property Name     | Description                                                                                       | Default Value                                                         |
| ----------------- | ------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------- |
| limit             | Number of categories to display, defaults to 0 (all categories).                                  | 0                                                                     |
| offset            | Offset of categories to display, defaults to 0 (start with the first)                             | 0                                                                     |
| sortby            | \[ name                                                                                           | description                                                           | parent | sortorder \] Field to sort on. | sortorder |
| sortdir           | \[ asc                                                                                            | desc \] Sort direction                                                | asc    |
| parent            | ID of a category to list subcategories under. Defaults to 0 (top-level).                          | 0                                                                     |
| includeSub        | \[ 1                                                                                              | 0 \] When 1 this will also include subcategories (only if parent = 0) | 1      |
| subSeparator      | Separator to use between individual sub categories.                                               | - (space dash space)                                                  |
| categorySeparator | Separator to use between individual categories.                                                   | line break (\\n)                                                      |
| tplCategory       | Chunk (name) to use for displaying categories. Note that subcategories have a different template. |

Placeholders you can use:

- id (category ID)
- name
- description
- parent (returns the ID or 0)
- subcategories (returns all subcategories for the current category object)
  Default file in core / components / bdlistings / elements / chunks / bdCategories.category.tpl:

  ``` php
  <h3>[[+name]]</h3>
  <p>[[+description]]</p>
  [[+subcategories]]
  ```

`tplInner` - Chunkname to use to wrap all subcategories in. The result of this is assigned to the subcategories placeholder in the tplCategory chunk. Could be used for `<optgroup>`s or some extra markup distinguishing subcategories.
Placeholders you can use:

- subcategories (returns all subcategories, each separated by the value in the subSeparator property)
  Default file in core / components / bdlistings / elements / chunks / `bdCategories.inner.tpl`:

``` php
  <p>Subcategories: [[+subcategories]]</p>
  ```

`tplOuter` - Chunk (name) to use to wrap all the categories in. The value of this is returned by the snippet.
Placeholders you can use:

- wrapper (returns all categories, each separated by the value in the categorySeparator property)
  Default file in core / components / bdlistings / elements / chunks / bdCategories.outer.tpl:

  ``` php
  <h2>Categories</h2>
  [[+wrapper]]
  ```

`tplSub` - Chunk (name) to use for displaying subcategories.
Placeholders you can use:

- id (category ID)
- name
- description
- parent (returns the parent ID)
  Default file in core / components / bdlistings / elements / chunks / bdCategories.outer.tpl:

``` php
  <a title="[[+description:htmlentities]]">[[+name]]</a>
  ```

## Examples

### Minimum call:

`[[!bdCategories]]`

Categories Structure

- Different
- Something
  - Something - Sub Category

Resulting HTML with default templates:

``` php
<h2>Categories</h2>
<h3>Different</h3>
<p></p>

<h3>Something</h3>
<p>sdfasdf?</p>
<p>Subcategories: <a title="">Something - Sub Category</a></p>
```

### Category Dropdown

Snippet call:

`[[!bdCategories? &tplCategory=`bdl.cat.cat` &tplSub=`bdl.cat.sub` &tplInner=`bdl.cat.inner` &tplOuter=`bdl.cat.outer` &subSeparator=`` &includeSub=`1` ]]`

bdl.cat.cat chunk:

``` php
<option value="[[+id]]">[[+name]]</option>
   [[+subcategories]]
```

bdl.cat.sub chunk:

``` php
<option value="[[+id]]">- [[+name]]</option>
```

bdl.cat.inner chunk:

``` php
[[+subcategories]]
```

bdl.cat.outer chunk:

``` php
<select name="category">
  [[+wrapper]]
</select>
```

Possible HTML output (depending on your category structure):

``` php
<select name="category">
  <option value="1">Clowns</option>
    <option value="2">- Friendly Clowns</option>
    <option value="3">- Halloween Clowns</option>
  <option value="4">Animals</option>
    <option value="5">- Horse Riding</option>
    <option value="6">- Alpacas</option>
  <option value="8">Kino</option>
</select>
```

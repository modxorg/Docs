---
title: "bdListings.bdCategories"
_old_id: "790"
_old_uri: "revo/bdlistings/bdlistings.bdcategories"
---

The bdCategories snippet can be used to output a dynamic category listing based on your categories in the bdListings component.

Snippet Properties
------------------

<table><tbody><tr><th>Property Name</th><th>Description</th><th>Default Value</th></tr><tr><td>limit</td><td>Number of categories to display, defaults to 0 (all categories).</td><td>0</td></tr><tr><td>offset</td><td>Offset of categories to display, defaults to 0 (start with the first)</td><td>0</td></tr><tr><td>sortby</td><td>\[ name | description | parent | sortorder \] Field to sort on.</td><td>sortorder</td></tr><tr><td>sortdir</td><td>\[ asc | desc \] Sort direction</td><td>asc</td></tr><tr><td>parent</td><td>ID of a category to list subcategories under. Defaults to 0 (top-level).</td><td>0</td></tr><tr><td>includeSub</td><td>\[ 1 | 0 \] When 1 this will also include subcategories (only if parent = 0)   
</td><td>1</td></tr><tr><td>subSeparator</td><td>Separator to use between individual sub categories.</td><td>- (space dash space)</td></tr><tr><td>categorySeparator</td><td>Separator to use between individual categories.</td><td>line break (\\n)</td></tr><tr><td>tplCategory</td><td>Chunk (name) to use for displaying categories. Note that subcategories have a different template.   
Placeholders you can use:   
- id (category ID)
- name
- description
- parent (returns the ID or 0)
- subcategories (returns all subcategories for the current category object)   
  Default file in core / components / bdlistings / elements / chunks / bdCategories.category.tpl: ```
  <pre class="brush: php">
  <h3>[[+name]]</h3>
  <p>[[+description]]</p>
  [[+subcategories]]
  
  ```

</td><td> </td></tr><tr><td>tplInner</td><td>Chunkname to use to wrap all subcategories in. The result of this is assigned to the subcategories placeholder in the tplCategory chunk. Could be used for <optgroup>s or some extra markup distinguishing subcategories.   
Placeholders you can use:   
- subcategories (returns all subcategories, each separated by the value in the subSeparator property)   
  Default file in core / components / bdlistings / elements / chunks / bdCategories.inner.tpl:   
  ```
  <pre class="brush: php">
  <p>Subcategories: [[+subcategories]]</p>
  
  ```

</td><td> </td></tr><tr><td>tplOuter</td><td>Chunk (name) to use to wrap all the categories in. The value of this is returned by the snippet.   
Placeholders you can use:   
- wrapper (returns all categories, each separated by the value in the categorySeparator property)   
  Default file in core / components / bdlistings / elements / chunks / bdCategories.outer.tpl:   
  ```
  <pre class="brush: php">
  <h2>Categories</h2>
  [[+wrapper]]
  
  ```

</td><td> </td></tr><tr><td>tplSub</td><td>Chunk (name) to use for displaying subcategories.   
Placeholders you can use:   
- id (category ID)
- name
- description
- parent (returns the parent ID)   
  Default file in core / components / bdlistings / elements / chunks / bdCategories.outer.tpl: ```
  <pre class="brush: php">
  <a title="[[+description:htmlentities]]">[[+name]]</a>
  
  ```

</td><td> </td></tr></tbody></table>Examples
--------

### Minimum call:

\[\[!bdCategories\]\]

Categories Structure

- Different
- Something 
  - Something - Sub Category

Resulting HTML with default templates:

```
<pre class="brush: php">
<h2>Categories</h2>
<h3>Different</h3>
<p></p>

<h3>Something</h3>
<p>sdfasdf?</p>
<p>Subcategories: <a title="">Something - Sub Category</a></p>

```### Category Dropdown

Snippet call:

\[\[!bdCategories? &tplCategory=`bdl.cat.cat` &tplSub=`bdl.cat.sub` &tplInner=`bdl.cat.inner` &tplOuter=`bdl.cat.outer` &subSeparator=`` &includeSub=`1` \]\]

bdl.cat.cat chunk:

```
<pre class="brush: php">
<option value="[[+id]]">[[+name]]</option>
   [[+subcategories]]

```bdl.cat.sub chunk:

```
<pre class="brush: php">
<option value="[[+id]]">- [[+name]]</option>

```bdl.cat.inner chunk:

```
<pre class="brush: php">
[[+subcategories]]

```bdl.cat.outer chunk:

```
<pre class="brush: php">
<select name="category"> 
  [[+wrapper]]
</select>

```Possible HTML output (depending on your category structure):

```
<pre class="brush: php">
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
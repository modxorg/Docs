---
title: "getMany"
_old_id: "1524"
_old_uri: "1.x/class-reference/xpdoobject/related-object-accessors/getmany"
---

xPDOObject::getMany()
---------------------

Gets a collection of objects related by aggregate or composite relations.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getMany>

```
<pre class="brush: php">
array &getMany (
   string $alias,
   [object $criteria = null],
   [boolean|integer $cacheFlag = true]
)

```Example
-------

Get all the Chunks in a Category and output their names.

```
<pre class="brush: php">
$category = $xpdo->getObject('Category',1);
$chunks = $category->getMany('Chunk');
foreach ($chunks as $chunk) {
   echo $chunk->get('name').'<br />';
}

```See Also
--------

- [getOne](/xpdo/1.x/class-reference/xpdoobject/related-object-accessors/getone "getOne")
- [Working with Related Objects](/xpdo/1.x/getting-started/using-your-xpdo-model/working-with-related-objects "Working with Related Objects")
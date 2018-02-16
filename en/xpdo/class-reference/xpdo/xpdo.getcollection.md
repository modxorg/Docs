---
title: "xPDO.getCollection"
_old_id: "1238"
_old_uri: "2.x/class-reference/xpdo/xpdo.getcollection"
---

xPDO::getCollection 
--------------------

Retrieves a collection of xPDOObjects by the specified xPDOCriteria.

If none are found, returns an empty array.

Syntax 
-------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#getCollection>

```
<pre class="brush: php">
array getCollection (string $className, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])

```Remember, if you are using xPDO map and class files that were generated from XML schema, the classname is **not** the same as your table name. If in doubt, have a look at the schema XML file, e.g.

```
<pre class="brush: php">
<object class="MyClassName" table="my_class_name" extends="xPDOObject">

```Examples 
---------

Get a collection of Box objects with a width of 40.

```
<pre class="brush: php">
$boxes = $xpdo->getCollection('Box',array(
   'width' => 40,
));

```### Get Pages 

Often getCollection is used inside MODX Snippets, so you will call it via the $modx object and you will be fetching built-in MODX object collections, such as pages.

```
<pre class="brush: php">
$pages = $modx->getCollection('modResource', array('template' => 3));

```<div class="tip">**Know Your Objects!**  
Remember that you need to call the collection by its object name. You may find it quite handy to keep open your `core/model/schema/modx.mysql.schema.xml` file so you can review your object names, e.g. "modResource" for pages, or "modChunk" for chunks etc. </div>See Also 
---------

- [Retrieving Objects](/xpdo/2.x/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects")
- [xPDO.getIterator](/xpdo/2.x/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
- [xPDO.getObject](/xpdo/2.x/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
- [xPDO.getCollectionGraph](/xpdo/2.x/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
- [xPDO.query](/xpdo/2.x/class-reference/xpdo/xpdo.query "xPDO.query")
- [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO")
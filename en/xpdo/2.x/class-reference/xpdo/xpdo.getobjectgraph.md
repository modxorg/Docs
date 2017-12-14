---
title: "xPDO.getObjectGraph"
_old_id: "1246"
_old_uri: "2.x/class-reference/xpdo/xpdo.getobjectgraph"
---

xPDO::getObjectGraph
--------------------

Retrieves a single object instance and related objects defined by a graph, by the specified criteria.

The graph can be an array or JSON object that describes relations from the specified $className.

The criteria can be a primary key value, an array of primary key values (for multiple primary key objects) or an xPDOCriteria object. If no $criteria parameter is specified, no class is found, or an object cannot be located by the supplied criteria, null is returned.

<div class="note">**Hot Models**   
 In order to use **getObjectGraph** effectively, you need to understand the data model behind your object. It pays to keep one finger on the XML schema file that defines your objects and their relations. If you attempt to join on another object when that relationship does not exist, this method will fail!</div>Syntax
------

API Docs: <http://api.modx.com/xpdo/xPDO.html#getObjectGraph>

```
<pre class="brush: php">xPDOObject|null getObjectGraph (string $className, array|str $graph, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])

```Example using Template Variables
--------------------------------

Before you try using this method to walk through your custom data model, here's an example of how it might be used to retrieve built-in MODX objects.

### Example of what NOT to do

You may be tempted to retrieve MODX Template Variable values by using **getObjectGraph**:

```
<pre class="brush: php">// DO NOT DO THIS!!!  TV's have some special methods
$page = $modx->getObjectGraph('modResource', '{"TemplateVarResources":{}}',123);
$output = '';
foreach ($page->TemplateVarResources as $tv) {
    $output .= $tv->get('value');  // or do something else with this value
}
return $output;

```<div class="note">**Heads Up!**   
 It's critical to understand that even though you may think you are retrieving a single object, that object may be joined to a _collection_ of related objects.</div>You'll notice that if you use the above example to get your TV values, you'll sometimes get weird JSON encoded values that are basically unusable! The lesson? **DO NOT RELY ON getObjectGraph to retrieve Template Variable values!** This is important: although you may be able to retrieve some values this way, the default TV values are stored in distant corners of the database, so you should instead rely on the **getTVValue** helper function.

### Use the getTVValue Helper Function

Instead, use the helper functions **getTVValue** and **setTVValue**:

```
<pre class="brush: php">$page = $modx->getObject('modResource', 123);
return $page->getTVValue('my_tv_name');

```Example
-------

Get a Box object with ID 134, along with related BoxColors and Color instances already loaded.

```
<pre class="brush: php">$box = $xpdo->getObjectGraph('Box', array('BoxColors' => array('Color' => array())), 134);
foreach ($box->getMany('BoxColors') as $boxColor) {
    echo $boxColor->getOne('Color')->get('name');
}

```The same example using a JSON-format $graph parameter.

```
<pre class="brush: php">$box = $xpdo->getObjectGraph('Box', '{"BoxColors":{"Color":{}}}', 134);
foreach ($box->getMany('BoxColors') as $boxColor) {
    echo $boxColor->getOne('Color')->get('name');
}

```<div class="note">**No additional queries**   
 The main benefit of using getObjectGraph is to retrieve data from related tables in a single query. No additional queries are executed when getMany() or getOne() are called on the related objects that are already loaded from the $graph.</div>See Also
--------

- [Retrieving Objects](/xpdo/2.x/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects")
- [xPDO.getObject](/xpdo/2.x/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
- [xPDO.getCollection](/xpdo/2.x/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
- [xPDO.getCollectionGraph](/xpdo/2.x/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
- [xPDO.getIterator](/xpdo/2.x/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
- <span class="error">\[xPDO.load\]</span>
- [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO")
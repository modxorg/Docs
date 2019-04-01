---
title: "xPDO.getCollectionGraph"
_old_id: "1239"
_old_uri: "2.x/class-reference/xpdo/xpdo.getcollectiongraph"
---

## xPDO::getCollectionGraph

Retrieves a collection of xPDOObjects and related objects by the specified xPDOCriteria.

If none are found, returns an empty array.

## Syntax

API Docs: <http://api.modx.com/xpdo/xPDO.html#getCollectionGraph>

``` php 
array getCollectionGraph (string $className, array|str $graph, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])
```

Remember, if you are using xPDO map and class files that were generated from XML schema, the classname is **not** the same as your table name. If in doubt, have a look at the schema XML file, e.g.

``` php 
<object class="MyClassName" table="my_class_name" extends="xPDOObject">
```

## Example

Get a collection of Box objects with related BoxColors and Color objects, where the Box has a width of 40.

``` php 
$boxes = $xpdo->getCollectionGraph('Box', '{"BoxColors":{"Color":{}}}', array('Box.width' => 40));
foreach ($boxes as $box) {
    foreach ($box->getMany('BoxColors') as $boxColor) {
        echo "A box with width of 40 and a color of " . $boxColor->getOne('Color')->get('name') . " was found.\n";
    }
}
```

**No additional queries**
The main benefit of using getCollectionGraph is to retrieve data from related tables in a single query. No additional queries are executed when getMany() or getOne() are called on the related objects that are already loaded from the $graph. Graph's are a useful alternative to using xPDO joins.

## Debugging

There are a couple caveats to keep in mind when using getCollectionGraph. You can't use the traditional "prepare" and "toSQL" methods. Consider the following code:

``` php 
$criteria['modResource.id:IN'] = array(1,2,3);
$criteria['TemplateVarResources.tmplvarid'] = 5;
$criteria = $modx->newQuery('modResource', $criteria);
$criteria->prepare();
print $criteria->toSQL();
$pages = $modx->getCollectionGraph('modResource', '{"TemplateVarResources":{"TemplateVar":{}}}', $criteria);
```

If you look at the query, you'll see there is nothing inherent in the $criteria object that specifies a JOIN. You're specifying columns in multiple tables (modResource and TemplateVarResources), but if you look at the query when you use the toSQL() method, you'll find that the query will not execute.

The join on the related tables occurs in this case when the getCollectionGraph() function is executed, so trying to print the SQL prior to that moment will not produce an accurate result.

## See Also

- [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
- [xPDO.getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
- [xPDO.getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
- [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
- [xPDO](extending-modx/xpdo "xPDO")
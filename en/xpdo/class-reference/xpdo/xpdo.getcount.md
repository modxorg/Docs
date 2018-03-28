---
title: "xPDO.getCount"
_old_id: "1240"
_old_uri: "2.x/class-reference/xpdo/xpdo.getcount"
---

## xPDO::getCount

Retrieves a count of xPDOObjects by the specified array or xPDOCriteria.

If you are specifying the select(), don't use getCount(), just run the query and get the results normally. getCount() is a shortcut that replaces your select() with COUNT(DISTINCT primaryKeyField) automatically, based on the primary key definition of the class you specify. Group by should work, as long as it makes sense with the COUNT(DISTINCT primaryKeyField) select clause.

**Syntax**

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#getCount>

``` php 
integer getCount (string $className, [mixed $criteria = null])
```

## Example

Get a count of all the Box objects with width 20.

``` php 
$total = $xpdo->getCount('Box',array(
   'width' => 20,
));
```

Note that if you pass this function a query object for the second parameter, the **limit** criteria may be ignored.

``` php 
$query = $modx->newQuery('States');
$query->limit(10, 0);  // <-- probably you want to put this line AFTER the getCount

$total_states = $modx->getCount('States',$query);

// If you have 50 states, this may print 50, not 10!  Be careful!
$modx->log(modX::LOG_LEVEL_ERROR, "Total States: $total_states");
```

## See Also

- [xPDO.getObject](/xpdo/2.x/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
- [xPDO.getCollection](/xpdo/2.x/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
- [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO")
---
title: "xPDO.getIterator"
_old_id: "1243"
_old_uri: "2.x/class-reference/xpdo/xpdo.getiterator"
---

## xPDO::getIterator

 Retrieves an xPDOIterator representing an iterable collection of xPDOObjects by the specified xPDOCriteria.

 Use an xPDOIterator to loop over large result sets and work with one instance at a time. This greatly reduces memory usage over loading the entire collection of objects into memory at one time. It is also slightly faster.

## Syntax

 ``` php 
xPDOIterator getIterator (string $className, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])
```

 Remember, if you are using xPDO map and class files that were generated from XML schema, the classname is **not** the same as your table name. If in doubt, have a look at the schema XML file, e.g.

 ``` xml 
<object class="MyClassName" table="my_class_name" extends="xPDOObject">
```

## Example

 Get an iterator for a collection of Box objects with a width of 40.

 ``` php 
$boxes = $xpdo->getIterator('Box',array(
   'width' => 40,
));
foreach ($boxes as $idx => $box) {
    echo "Box #{$idx} has an id of {$box->get('id')} and a width of {$box->get('width')}\n";
}
```

 If no matching xPDOObjects are found, the xPDOIterator object will be empty but will still be an object, so the following won't work (opposed to [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")):

 ``` php 
// a parent of -1 doesn't exist, this is intentional =)
$resourceObjs = $xpdo->getIterator('modResource', array('parent' => -1));
if ($resourceObjs) { // the same goes for if (!empty($resourceObjs)
    // this will always run, as the $resourceObjs is never empty
    // in the sense we would intuitively think of empty
    // the $resourceObjs contains an empty xPDOIterator object, but it's not an empty array!
}
// if you really need to check if there's something to iterate, you could do either:
if ($xpdo->getCount('modResource', array('parent' => -1))) {
    // this will not run
}
// or
$resourceObjs->rewind();
if ($resourceObjs->valid()) {
    // this will not run
}
```

## See Also

- [Retrieving Objects](xpdo/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects")
- [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
- [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
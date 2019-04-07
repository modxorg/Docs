---
title: "addMany"
_old_id: "1144"
_old_uri: "2.x/class-reference/xpdoobject/related-object-accessors/addmany"
---

## xPDOObject::addMany()

 Adds an object or collection of objects related to this class.

## Syntax

 API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoobject.class.html#%5CxPDOObject::addMany()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#%5CxPDOObject::addMany())

 ``` php
boolean addMany (
   mixed &$obj,
   [string $alias = '']
)
```

## Example

 Add golf clubs to a bag and save.

 ``` php
$bag = $xpdo->newObject('GolfBag');
$bag->set('name',"Chris's Bag");
$bag->set('color','blue');
$clubs = array();
for ($i=1;$i<10;$i++) {
   $club = $xpdo->newObject('GolfClub');
   $club->set('name',$i.' Iron');
   $clubs[] = $club;
}
$bag->addMany($clubs);
$bag->save(); // saves both the bag and all the clubs
```

 **Nested Calls** You can nest one addMany() call inside another and thus create all your related data via a single save() operation.

## Troubleshooting

 Remember that this operation is intended to be called only for objects whose relationships are defined as cardinality="many". ## See Also

- [Working with Related Objects](extending-modx/xpdo/retrieving-objects/related-objects "Working with Related Objects")
- [addOne()](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/addone)
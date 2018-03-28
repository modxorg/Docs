---
title: "addOne"
_old_id: "1145"
_old_uri: "2.x/class-reference/xpdoobject/related-object-accessors/addone"
---

## xPDOObject::addOne()

 Adds an object related to this instance by a foreign key relationship.

## Syntax

 API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoobject.class.html#%5CxPDOObject::addOne()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#%5CxPDOObject::addOne())

 ``` php 

boolean addOne (
   mixed &$obj,
   [string $alias = '']
)

```

## Example

 Add a Rank to a newly-created Person, then save both through cascading.

 ``` php 

$person = $xpdo->newObject('Person',1);
$person->set('fname','Johnny');
$person->set('lname','Benjamins');
$rank = $xpdo->newObject('Rank');
$rank->set('title','CEO');
$rank->set('level',1);
$person->addOne($rank);
$person->save(); // will save both person and rank

```

## Troubleshooting

 If you're having trouble using this function, it's helpful to increase the logging level:

 ``` php 

$modx->setLogLevel(4); // show all debugging info

```

 If you are getting errors like the following: ``` php 

Foreign key definition for class , alias XXXXX not found, or cardinality is not 'one'.

```

 then you should probably be using [addMany()](xpdo/class-reference/xpdoobject/related-object-accessors/addmany) instead. Check your XML schema file for the object which is attempting to run addOne and verify that the relationship to the object you are trying to add is defined with cardinality="one".

## See Also

- [Working with Related Objects](xpdo/getting-started/using-your-xpdo-model/working-with-related-objects "Working with Related Objects")
- [addMany()](xpdo/class-reference/xpdoobject/related-object-accessors/addmany)
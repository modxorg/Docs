---
title: "xPDOQuery.orCondition"
_old_id: "1295"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.orcondition"
---

## xPDOQuery::orCondition

 Add an OR condition to the WHERE statement in the query.

## Syntax

 API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoquery.class.html#\\xPDOQuery::orCondition()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::orCondition())

 ``` php
void orCondition ( $conditions, [ $binding = null], [ $group = 0])
```

## Example

 Grab all boxes with width 12 or 14.

 ``` php
$query = $xpdo->newQuery('Box');
$query->where(array(
   'width' => 14,
));
$query->orCondition(array(
   'width' => 12,
));
$boxes = $xpdo->getCollection('Box',$query);
```

 **Warning** 
 The order you call the functions is important! The **orCondition** must come after the **where** method has been used. 

## Another Example

 Here's a more familiar example used to retrieve pages when they've got publish/unpublish dates set. This demonstrates an alternative syntax for an or condition. Normally, each place in the array supplied to the **where** method is joined together by a SQL "AND", but you can use the "OR" prefix on your column names to specify how groups of terms are joined together.

 In the following example, a page _must_ be published (1), and the pub\_date must be either zero OR less than or equal to the current timestamp. The unpub\_date must be either zero OR greater than current timestamp.

 ``` php
$criteria = $modx->newQuery('modResource');
$criteria->where(array(
        'published' => 1,
                array(
                        'pub_date' => 0,
                        'OR:pub_date:<=' => time(),
                ),
                array(
                        'unpub_date' => 0,
                        'OR:unpub_date:>' => time(),
                ),              
        )
);
```

## Example With Joined Tables

Your filter parameters can reference fields in other tables.

 ``` php
$query = $modx->newQuery('modUser');
$query->innerJoin('modUserProfile','Profile'); 
$query->where(array(
   'modUser.username' => $email,
));
$query->orCondition(array(
   'Profile.email' => $email,
));    
$user = $modx->getObject('modUser', $query);
```

 The filter parameters may use the class name (as in modUser above) or the alias (as the Profile above). 

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
---
title: "xPDOQuery"
_old_id: "1289"
_old_uri: "2.x/class-reference/xpdoquery"
---

The `xPDOQuery` extends the `xPDOCriteria` class and allows you to abstract out complex SQL queries into an OOP format. This allows encapsulation of SQL calls so that they can work in multiple database types, and be easy to read and dynamically build.

1. [xPDOQuery.andCondition](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.andcondition)
2. [xPDOQuery.command](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.command)
3. [xPDOQuery.condition](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.condition)
4. [xPDOQuery.distinct](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.distinct)
5. [xPDOQuery.from](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.from)
6. [xPDOQuery.groupby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.groupby)
7. [xPDOQuery.having](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.having)
8. [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin)
9. [xPDOQuery.isConditionalClause](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.isconditionalclause)
10. [xPDOQuery.isValidClause](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.isvalidclause)
11. [xPDOQuery.join](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.join)
12. [xPDOQuery.leftJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin)
13. [xPDOQuery.limit](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.limit)
14. [xPDOQuery.orCondition](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.orcondition)
15. [xPDOQuery.prepare](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.prepare)
16. [xPDOQuery.rightJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.rightjoin)
17. [xPDOQuery.select](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.select)
18. [xPDOQuery.set](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.set)
19. [xPDOQuery.setClassAlias](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.setclassalias)
20. [xPDOQuery.sortby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby)
21. [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where)

## Examples

Grab the first 4 Boxes with:

1. Owners that have the letter 'a' in their names
2. A width of at least 10
3. A height that is not 2
4. A color of 'red','blue' or 'green'
5. sorted by the Box name, ascending and then by the Box height, descending

``` php
$query = $xpdo->newQuery('Box');
// Remember: syntax here is classname, your alias. Note that filters use the alias.
$query->innerJoin('Owner','User');
// the Owner is actually a User object, defined as Owner in the relationship alias
$query->where(array(
    'Owner.name:LIKE' => '%a%',
    'Box.width:>=' => 10,
    'Box.height:!=' => 2,
    'Box.color:IN' => array('red','green','blue'),
));
$query->sortby('Box.name','ASC');
$query->sortby('Box.height','DESC');
$query->limit(4);
$boxes = $xpdo->getCollection('Box',$query);
```

You can also do more complex queries, like so:

``` php
$query = $xpdo->newQuery('Person');
$query->where(array(
    array(
        'first_name:=' => 'Bob',
        array(
            'OR:last_name:LIKE' => 'Boblablaw',
            'AND:gender:=' => 'M',
        ),
    ),
    'password:!=' => null,
));
```

translates to:

``` php
(
  (      `Person`.`first_name` = 'Bob'
    OR ( `Person`.`last_name` LIKE 'Boblablaw' AND `Person`.`gender` = 'M' )
  )
  AND password IS NOT NULL
)
```

Note that if you're specifying the conditional in the key string, such as 'OR:disabled:!=' => true, you'll need to specify the operand as well. This means that you must specify = explicitly, such as in:  'AND:gender:=' => 'M'

### Valid Operators

``` php
$c = $xpdo->newQuery('Person');
$c->where(array(
  'name:=' => 'John', /* Equal To */
  'name:!=' => 'Sue', /* Unequal To */
  'age:>' => '21', /* Greater Than */
  'age:>=' => '21', /* Greater Than or Equal To */
  'age:<' => '18', /* Less Than */
  'age:<=' => '18', /* Less Than or Equal To */
  'search:LIKE' => 'Term', /* LIKE statement */
  'field' => null, /* check for NULL */
  'ids:IN' => array(1,2,3), /* IN statement */
));
```

## Debugging

Sometimes you need to see what query is actually being generated. You can do this by preparing the query and outputting it using the **toSQL()** method.

``` php
$c = $xpdo->newQuery('Person');
// add filters here...
$c->prepare();
print $c->toSQL();
```

## See Also

- [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
- [xPDO.newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")

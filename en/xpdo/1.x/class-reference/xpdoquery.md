---
title: "xPDOQuery"
_old_id: "1630"
_old_uri: "1.x/class-reference/xpdoquery"
---

The xPDOQuery extends the xPDOCriteria class and allows you to abstract out complex SQL queries into an OOP format. This allows encapsulation of SQL calls so that they can work in multiple database types, and be easy to read and dynamically build.

1. [xPDOQuery.andCondition](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.andcondition)
2. [xPDOQuery.groupby](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.groupby)
3. [xPDOQuery.innerJoin](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.innerjoin)
4. [xPDOQuery.leftJoin](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.leftjoin)
5. [xPDOQuery.limit](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.limit)
6. [xPDOQuery.orCondition](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.orcondition)
7. [xPDOQuery.rightJoin](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.rightjoin)
8. [xPDOQuery.select](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.select)
9. [xPDOQuery.setClassAlias](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.setclassalias)
10. [xPDOQuery.sortby](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.sortby)
11. [xPDOQuery.where](/xpdo/1.x/class-reference/xpdoquery/xpdoquery.where)

Examples
--------

Grab the first 4 Boxes with:

1. Owners that have the letter 'a' in their names
2. A width of at least 10
3. A height that is not 2
4. sorted by the Box name, ascending and then by the Box height, descending

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->innerJoin('Owner','User'); 
// the Owner is actually a User object, defined as Owner in the relationship alias
$query->where(array(
    'Owner.name:LIKE' => '%a%',
    'Box.width:>=' => 10,
    'Box.height:!=' => 2,
));
$query->sortby('Box.name','ASC');
$query->sortby('Box.height','DESC');
$query->limit(4);
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [Retrieving Objects](/xpdo/1.x/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects")
- [xPDO.newQuery](/xpdo/1.x/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
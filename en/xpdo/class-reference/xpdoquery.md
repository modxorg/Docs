---
title: "xPDOQuery"
_old_id: "1289"
_old_uri: "2.x/class-reference/xpdoquery"
---

 The xPDOQuery extends the xPDOCriteria class and allows you to abstract out complex SQL queries into an OOP format. This allows encapsulation of SQL calls so that they can work in multiple database types, and be easy to read and dynamically build.

1. [xPDOQuery.andCondition](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.andcondition)
2. [xPDOQuery.groupby](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.groupby)
3. [xPDOQuery.innerJoin](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.innerjoin)
4. [xPDOQuery.leftJoin](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.leftjoin)
5. [xPDOQuery.limit](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.limit)
6. [xPDOQuery.orCondition](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.orcondition)
7. [xPDOQuery.rightJoin](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.rightjoin)
8. [xPDOQuery.select](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.select)
9. [xPDOQuery.setClassAlias](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.setclassalias)
10. [xPDOQuery.sortby](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.sortby)
11. [xPDOQuery.where](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.where)

## Examples

 Grab the first 4 Boxes with:

1. Owners that have the letter 'a' in their names
2. A width of at least 10
3. A height that is not 2
4. A color of 'red','blue' or 'green'
5. sorted by the Box name, ascending and then by the Box height, descending
 
```
<pre class="brush: php">
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

``` You can also do more complex queries, like so:

 ```
<pre class="brush: php">
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

``` translates to:

 ```
<pre class="brush: php">
(
  (      `Person`.`first_name` = 'Bob' 
    OR ( `Person`.`last_name` LIKE 'Boblablaw' AND `Person`.`gender` = 'M' )
  )
  AND password IS NOT NULL
)

``` Note that if you're specifying the conditional in the key string, such as 'OR:disabled:!=' => true, you'll need to specify the operand as well. This means that you must specify = explicitly, such as in:  'AND:gender:=' => 'M'

 

### Valid Operators

 ```
<pre class="brush: php">
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

```## Debugging

 Sometimes you need to see what query is actually being generated. You can do this by preparing the query and outputting it using the **toSQL()** method.

 ```
<pre class="brush: php">
$c = $xpdo->newQuery('Person');
// add filters here...
$c->prepare();
print $c->toSQL();

```## See Also

- [Retrieving Objects](/xpdo/2.x/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects")
- [xPDO.newQuery](/xpdo/2.x/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
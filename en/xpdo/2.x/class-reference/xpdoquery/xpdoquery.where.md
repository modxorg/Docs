---
title: "xPDOQuery.where"
_old_id: "1300"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.where"
---

 xPDOQuery::where 
------------------

 Add a WHERE condition to the query. In general, the way this works is you append an operator to an attribute after a colon.

 ```
<pre class="brush: php">array('attribute:operator' => 'value')

```<table><tbody><tr><th> Operator </th> <th> Symbol </th> <th> Example </th> </tr><tr><td> Equals </td> <td> _none_ </td> <td>`$query->where(array('width' => 15));` </td> </tr><tr><td> Not Equals </td> <td> != </td> <td>`$query->where(array('width:!=' => 15));` </td> </tr><tr><td> Greater Than </td> <td> > </td> <td>`$query->where(array('width:>' => 15));` </td> </tr><tr><td> Less Than </td> <td> < </td> <td>`$query->where(array('width:<' => 15));` </td> </tr><tr><td> Greater Than or Equal to </td> <td> >= </td> <td>`$query->where(array('width:>=' => 15));` </td> </tr><tr><td> Less Than or Equal to </td> <td> <= </td> <td>`$query->where(array('width:<=' => 15));` </td> </tr><tr><td> Like </td> <td> LIKE </td> <td>`$query->where(array('width:LIKE' => '%15%'));` </td> </tr><tr><td> Not Like </td> <td> NOT LIKE </td> <td>`$query->where(array('width:NOT LIKE' => '%15%'));` </td> </tr><tr><td> Exists in </td> <td> IN </td> <td>`$query->where(array('width:IN' => array(15,16,17,20)));` </td> </tr><tr><td> Not Exists in </td> <td> NOT IN </td> <td>`$query->where(array('width:NOT IN' => array(15,16,17,20)));` </td> </tr><tr><td> Is Null </td> <td> IS </td> <td>`$query->where(array('width:IS' => null));` </td></tr></tbody></table> Syntax 
--------

 API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoquery.class.html#\\xPDOQuery::where()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::where())

 ```
<pre class="brush: php">xPDOQuery where ([mixed $conditions = ''],
 [string $conjunction = xPDOQuery::SQL_AND],
 [mixed $binding = null],
 [integer $condGroup = 0])

``` Examples 
----------

 Get all Boxes with width of 15.

 ```
<pre class="brush: php">$query = $xpdo->newQuery('Box');
$query->where(array(
   'width' => 15,
));
$boxes = $xpdo->getCollection('Box',$query);

``` Get all boxes with a width of 15 or 10.

 ```
<pre class="brush: php">$query = $xpdo->newQuery('Box');
$query->where(array('width' => 15));
$query->where(array('width' => 10),xPDOQuery::SQL_OR); // you can use orCondition here as well
$boxes = $xpdo->getCollection('Box',$query);

``` An alternative method to get boxes with a width of 15 or 10.

 ```
<pre class="brush: php">$query = $xpdo->newQuery('Box');
$query->where(array(
	array( // two arrays used to contain the OR statement within the listed conditions
   		'width' => 15
	),
	array(
		'width' => 10
	)
),xPDOQuery::SQL_OR); // use one array if no additional where statements are used.
$boxes = $xpdo->getCollection('Box',$query);

``` Next alternative method to get boxes with a width of 15 or 10.

 ```
<pre class="brush: php">$query = $xpdo->newQuery('Box');
$query->where(array(
	array(
   		'width' => 15
	),
	array(
		'OR:width:=' => 10
	)
));
$boxes = $xpdo->getCollection('Box',$query);

``` Grab all boxes with a width greater than or equal to 15, but not with a width of 23.

 ```
<pre class="brush: php">$query = $xpdo->newQuery('Box');
$query->where(array(
   'width:>=' => 15,
   'width:!=' => 23,
));
$boxes = $xpdo->getCollection('Box',$query);

``` Get all boxes with a name with the letter 'q' in it:

 ```
<pre class="brush: php">$query = $xpdo->newQuery('Box');
$query->where(array(
   'name:LIKE' => '%q%',
));
$boxes = $xpdo->getCollection('Box',$query);

``` Using and & or in the same query to get all boxes with a width of 15 or 10 and a height between 10 and 15.

 ```
<pre class="brush: php">$query = $xpdo->newQuery('Box');
$query->where(array(
   array(
      'width:=' => 15, // note that adding 'AND:' or 'OR:' in front of the attribute, an operator must be used ':='
      'OR:width:=' => 10
   ),
   array(
      'AND:height:>=' => 10,
      'AND:height:<=' => 15
   )
));
$boxes = $xpdo->getCollection('Box',$query);

```###  More Complex Examples 

 If you have a more complex model with many joined tables, the where method should refer _only to the_ **_class alias_** (not the class name) that contains the attribute. Below is an example of a query passed to the [getCollectionGraph](/xpdo/2.x/getting-started/using-your-xpdo-model/retrieving-objects/getcollectiongraph "getCollectionGraph") method, where you can see that myTable object is joined through to the user profile information.

 ```
<pre class="brush: php">$query = $modx->newQuery('myTable');
$query->where(array('Profile.fullname:LIKE' => '%Company%'));
$records = $this->ParentCMS->getCollectionGraph('myTable', '{"modUser": {"Profile":{} } }',$query);

``` Another method is to pass a $criteria array immediately as the 2nd argument to newQuery. Notice how the alias "Resource" is used since that's what is listed as the alias in the schema definition for the modTemplateVarResource object:

 ```
<pre class="brush: php">$criteria = array();
$criteria['modTemplateVarResource.tmplvarid'] = 9;
$criteria['modTemplateVarResource.value:IN'] = array('Red','Green','Blue');
$criteria['Resource.template'] = 2;
$criteria = $modx->newQuery('modTemplateVarResource', $criteria);
$tvrs = $modx->getCollectionGraph('modTemplateVarResource','{"Resource":{}}', $criteria);

``` Here are a couple of different examples of doing subqueries:

 <http://forums.modx.com/index.php?topic=60287.0>

 <https://github.com/netProphET/revolution/commit/464b8ff3d05f7114412ef19c3ec4729fa78ffeba>

 See Also 
----------

- [xPDOQuery](/xpdo/2.x/class-reference/xpdoquery "xPDOQuery")
---
title: "Retrieving Objects"
_old_id: "1207"
_old_uri: "2.x/getting-started/using-your-xpdo-model/retrieving-objects"
---

To get Objects in xPDO, there are a variety of methods. The two basic themes we'll concern ourselves with here is in the differences between an Object, a Collection, and an Iterator.

An Object is a single `xPDOObject`, nothing more, nothing less. It is retrieved via `xPDO::getObject()`. Think of it like one row in a database table.

A Collection is an array of `xPDOObjects`. They are retrieved via `xPDO::getCollection`. Think of it as a list of rows in a table.

An Iterator is a special kind of Collection which is accessed sequentially so that all of the rows and objects representing them are not loaded into memory all at once.

### [xPDO::getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")

`getObject` takes 3 arguments: `$className`, `$criteria`, and `$cacheFlag`. The first argument is the class name you'd like to retrieve; the second is the criteria by which you'd like to search for it; and the final argument is the caching option for the object.

If an integer value is provided for the `$cacheFlag` argument, then it specifies the time to live in the object cache; if cacheFlag === false, caching is ignored for the object and if cacheFlag === true, the object will live in the cache indefinitely.

Back to `$criteria`. This can be one of 3 things:

- A primary key value
- An array of field(s)
- An xPDOCriteria object or derivative.

We'll get back to the third option later. First, an example of the first option:

``` php
$box23 = $xpdo->getObject('Box',23);
```

If an object doesn't exist, it will return 'null'.

You can specify multiple filter criteria inside your 2nd argument:

``` php
// GroupUser is a table with 2 PKs - 'user' and 'group'
$gu = $xpdo->getObject('GroupUser',array(
   'user' => 12,
   'group' => 4,
));
```

Or, let's say we wanted to grab the first Box object we find with a width of 150:

``` php
$bigbox = $xpdo->getObject('Box',array('width' => 150));
```

**Handy Hint**
If your criteria matches multiple objects, getObject will only return the _first one_. Which one will be first? It's up to the database and how its natural sort order.

We'll discuss the third option, `xPDOCriteria`, later in the `xPDOQuery` and `xPDOCriteria` sections.

### [xPDO::getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")

`xPDO::getCollection` takes the same three arguments as `getObject`; except the `$criteria` field must be either an array or `xPDOCriteria` object.

Let's say we wanted to grab all the Box objects with width of 14:

``` php
// assume we have 3 boxes
$boxes = $xpdo->getCollection('Box',array(
  'width' => 14,
));
foreach ($boxes as $box) {
   echo $box->get('color')."\n";
}
// If our 3 boxes had a color of 'red','blue' and 'yellow', this would print:
// red
// blue
// yellow
```

### [xPDO::getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")

The `xPDO::getIterator` method is identical to `xPDO::getCollection` except that you can only access one `xPDOObject` from the Collection of rows at one time. If you need access to all of the objects/rows at once, use `getCollection`. Otherwise, it is more efficient in terms of memory usage, to use getIterator to loop through a Collection of `xPDOObjects.

The code for iterating over the Box objects with width of 14 is almost identical to that of `getCollection`:

``` php
// assume we have 3 boxes, with colors 'red','blue' and 'yellow'
$boxes = $xpdo->getIterator('Box', array(
  'width' => 14,
));
foreach ($boxes as $box) {
   echo $box->get('color')."\n";
}
// this would print:
// red
// blue
// yellow
```

Note that the index for each object when iterated over is not the primary key, unlike the array index when using getCollection.

### [xPDO::newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")

One of the most powerful parts of xPDO is its ability to create complex queries in a simple fashion using the [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") wrapper. This class lets you build SQL queries using OOP methods that extend the `xPDOCriteria` class – you can pass its instance right into getObject or getCollection calls. The newQuery function creates an [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") object, and takes 3 parameters:

- **$class** - The class name to create the query for.
- **$criteria** - This is optional; but you can specify criteria here.
- **$cacheFlag** - Similar to getObject's cacheFlag, you can specify the caching behavior for this query.

First, let's just show how you might use newQuery to define the criteria we used before: width = 14. We'll just add a sorting option to sort the results.

``` php
$c = $xpdo->newQuery('Box');
$c->where(array('width' => 14));
$c->sortby('name','ASC');
$boxes = $xpdo->getCollection('Box',$c);
```

Once you have your result, you can iterate over the array (see above). You can see the similarity between the defining a query object and passing a simple array to getObject or getCollection. So why use [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")? It's more flexible. Did you see how we could use it to specify the sorting order?

Next, let's use the query to join on a related table using [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). Let's create an example query using [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") that will grab the first 5 Boxes with width of 5 and an owner of ID 2, sorted by their name. Our "Box" table has a many-to-many relationship with the "BoxOwner" table.

``` php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // arguments are className, alias
$c->where(array(
   'width' => 5,
   'Owner.user' => 2,
));
$c->sortby('name','ASC');
$c->limit(5);
$boxes = $xpdo->getCollection('Box',$c);
```

We can join on 3rd table ("Owner") by using another call to [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). Let's also grab the 2nd 5 Boxes by specifying an offset – it's a 2nd argument to the limit() function:

``` php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // arguments are: className, alias
$c->innerJoin('User','User','Owner.user = User.id');
// note the 3rd argument that defines the relationship in the innerJoin
$c->where(array(
   'Box.width' => 5,
   'User.user' => 2,
));
$c->sortby('Box.name','ASC');
$c->limit(5,5); // limit, offset
$boxes = $xpdo->getCollection('Box',$c);
```

You can see that the sortby and where functions can take dot syntax on their parameters; they can prefix their columns with alias – sometimes they have to do this to prevent collisions!

More information on [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") can be found [here](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery").

The xml schema can be found in your MODX installation's core folder, here: model/schema/modx.mysql.schema.xml (helpful to get classNames, aliases, etc for your queries)

#### Debugging

Often it can be confusing to rely on an ORM layer, so you can force xPDO to print out the raw database queries.

``` php
$c = $xpdo->newQuery('Box');
// ... add some more criteria...
$c->prepare();
print $c->toSQL();
```

### xPDOCriteria

One of the most powerful parts of xPDO is its ability to create complex queries in a simple fashion using the [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") wrapper. This class lets you build SQL queries using OOP methods that extend the xPDOCriteria class – you can pass its instance right into getObject or getCollection calls. The newQuery function creates an [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") object, and takes 3 parameters:

- **$class** - The class name to create the query for.
- **$criteria** - This is optional; but you can specify criteria here.
- **$cacheFlag** - Similar to getObject's cacheFlag, you can specify the caching behavior for this query.

First, let's just show how you might use newQuery to define the criteria we used before: width = 14. We'll just add a sorting option to sort the results.

``` php
$c = $xpdo->newQuery('Box');
$c->where(array('width' => 14));
$c->sortby('name','ASC');
$boxes = $xpdo->getCollection('Box',$c);
```

Once you have your result, you can iterate over the array (see above). You can see the similarity between the defining a query object and passing a simple array to getObject or getCollection. So why use [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")? It's more flexible. Did you see how we could use it to specify the sorting order?

Next, let's use the query to join on a related table using [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). Let's create an example query using [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") that will grab the first 5 Boxes with width of 5 and an owner of ID 2, sorted by their name. Our "Box" table has a many-to-many relationship with the "BoxOwner" table.

``` php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // arguments are className, alias
$c->where(array(
   'width' => 5,
   'Owner.user' => 2,
));
$c->sortby('name','ASC');
$c->limit(5);
$boxes = $xpdo->getCollection('Box',$c);
```

We can join on 3rd table ("Owner") by using another call to [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). Let's also grab the 2nd 5 Boxes by specifying an offset – it's a 2nd argument to the limit() function:

``` php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // arguments are: className, alias
$c->innerJoin('User','User','Owner.user = User.id');
// note the 3rd argument that defines the relationship in the innerJoin
$c->where(array(
   'Box.width' => 5,
   'User.user' => 2,
));
$c->sortby('Box.name','ASC');
$c->limit(5,5); // limit, offset
$boxes = $xpdo->getCollection('Box',$c);
```

You can see that the sortby and where functions can take dot syntax on their parameters; they can prefix their columns with alias – sometimes they have to do this to prevent collisions!

More information on [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") can be found [here](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery").

See also [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where")

## Graphs

A graph extends the idea of an object (or objects in collections). Instead of a simple object, a graph includes references to related objects. Graphs are a useful alternative to JOINs.

### xPDO::getObjectGraph

This is the same as getCollectionGraph, but it returns a single object. See getCollectionGraph below for info.

### xPDO::getCollectionGraph

``` php
$collection= $xpdo->getCollectionGraph('Zip', '{"TZ":{},"ST":{},"CT":{}}');
if ($collection) {
        foreach ($collection as $obj) {
                $out = $obj->toArray();
                $out['timezone'] = $obj->TZ->get('tzname');
                $out['state'] = $obj->ST->get('statename');
                $out['county'] = $obj->CT->get('countyname');
                print_r($out);
        }
}
```

**Aliases in JSON**
Remember that the JSON hash passed to getObjectGraph or getCollectionGraph needs to use _aliases_, not class names.

You have direct access to all of the fields (table rows) in the Collection Graph comprised in these four tables. The alias is used to create the graph. In this example, the 'Zip' table is the primary table, so we look at that table and we define relationships from the perspective of that primary table.

As with getObject and getCollection, we can supply a $criteria object to getCollectionGraph. Let's add some criteria to our getCollectionGraph() query. In this example, we can search for zipcodes in California (CA)

``` php
$criteria = $modx->newQuery('Zip');
$criteria->where(array('ST.statename' => 'CA'));
$collection= $xpdo->getCollectionGraph('Zip', '{"TZ":{},"ST":{},"CT":{}}', $criteria);
if ($collection) {
        foreach ($collection as $obj) {
                $out = $obj->toArray();
                $out['timezone'] = $obj->TZ->get('tzname');
                $out['state'] = $obj->ST->get('statename');
                $out['county'] = $obj->CT->get('countyname');
                print_r($out);
        }
}
```

**Aliases in Criteria**
The table names you specify in your criteria must use the _aliases_, not the class names (just like the JSON hashes).

Let's show one more example, this time using MODX tables. This is only an example: filtering on Template Variables is a bit dangerous because the values stored in the database are not always the verbatim values you experience in the manager or in your templates. But this example should help demonstrate the usage of aliases and that you must be aware of the relationships between the objects (some related objects are singular, some are arrays).

``` php
$criteria = array();
$criteria['modResource.id:IN'] = array(1,2,3);
$criteria['TemplateVarResources.tmplvarid'] = 5;
$criteria = $modx->newQuery('modResource', $criteria);
$pages = $modx->getCollectionGraph('modResource', '{"TemplateVarResources":{"TemplateVar":{}}}', $criteria);
if ($pages) {
    foreach ($pages as $p) {
        print $p->get('pagetitle');
        foreach ($p->TemplateVarResources as $tvr) {
            $name = $tvr->TemplateVar->get('name');
            print $name . ' is '. $tvr->get('value');
        }
    }
}
```

Please view the dedicated page: [getCollectionGraph](extending-modx/xpdo/retrieving-objects/graphs "getCollectionGraph")

## See Also

- [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
- [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
- [getCollectionGraph](extending-modx/xpdo/retrieving-objects/graphs "getCollectionGraph")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
- [xPDO.newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
- [xPDO.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDO.where")

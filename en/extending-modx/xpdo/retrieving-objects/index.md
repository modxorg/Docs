---
title: "Retrieving Objects"
_old_id: "1207"
_old_uri: "2.x/getting-started/using-your-xpdo-model/retrieving-objects"
---

To get Objects in xPDO, there are a variety of methods. The key differences are between an Object, a Collection, and an Iterator.

An Object is a single `xPDOObject` — one row in a database table. Retrieved via `xPDO::getObject()`.

A Collection is an array of `xPDOObjects` — a list of rows. Retrieved via `xPDO::getCollection`.

An Iterator is a special kind of Collection accessed sequentially, so not all rows are loaded into memory at once.


> **Important:** do not pass untrusted input into the criteria parameter of the `xPDO::getObject()` or related methods. **Always sanitize the value, cast the value to integer for a primary key** (`getObject`/`getObjectGraph`), **or provide the criteria in array form** if it comes from any sort of user input to prevent potential SQL injections or returning data not supposed to be accessible. xPDO attempts to identify and prevent SQL injections, however as it also supports providing raw SQL criteria in several cases, not sanitizing the criteria may make your code vulnerable. 
> 
> Similarly do not pass untrusted input to the `sortby()` method on an `xPDOQuery` object. The direction accepts `ASC`, `DESC`, `ASCENDING`, or `DESCENDING`. The column is validated against a list of allowed SQL clauses; if it contains suspicious patterns (e.g. `;`, `UNION`, `sleep()`, `benchmark()`), it will be rejected. Checking a value against acceptable column names is still the most secure option.    

### [xPDO::getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")

`getObject` takes 3 arguments: `$className`, `$criteria`, and `$cacheFlag`. The first argument is the class name you'd like to retrieve; the second is the criteria by which you'd like to search for it; and the final argument is the caching option for the object.

If an integer value is provided for the `$cacheFlag` argument, then it specifies the time to live in the object cache; if cacheFlag === false, caching is ignored for the object and if cacheFlag === true, the object will live in the cache indefinitely.

Back to `$criteria`. This can be one of 4 things:

-   A primary key value
-   An array of field(s)
-   Raw SQL representing a valid condition (only for string primary keys; for integer primary keys, use an array or `xPDOCriteria` object)
-   An xPDOCriteria object or derivative.

We'll get back to the fourth option later. First, an example of the first option:

```php
$box23 = $xpdo->getObject('Box', 23);
```

When using this approach, **always sanitize your input**, for example by casting a user-provided value to an integer first.

If an object doesn't exist, it will return 'null'.

You can specify multiple filter criteria inside your 2nd argument:

```php
// GroupUser is a table with 2 PKs - 'user' and 'group'
$gu = $xpdo->getObject('GroupUser', [
    'user' => 12,
    'group' => 4,
]);
```

Or, let's say we wanted to grab the first Box object we find with a width of 150:

```php
$bigbox = $xpdo->getObject('Box', ['width' => 150]);
```

For classes with a string primary key, you can also provide a raw SQL condition to getObject as a string:

```php
$bigbox = $xpdo->getObject('Box', '`width` = 150');
```

**Note:** For classes with an integer primary key, a raw SQL string criteria will not work — use an array or `xPDOCriteria` object instead.

**Never use this approach with untrusted user input.** Use of the array syntax is very strongly recommended to make use of prepared statements and be protected against SQL injection or accessing information the user is not supposed to.  

> **Good to know**: If your criteria matches multiple objects, getObject will only return the _first one_. xPDO does not add an ORDER BY clause; the order is determined by the database.

We'll discuss the fourth option, `xPDOCriteria`, later in the `xPDOQuery` and `xPDOCriteria` sections.

### [xPDO::getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")

`xPDO::getCollection` takes the same three arguments as `getObject`; the `$criteria` field can be an array, `xPDOCriteria` object, or a primary key value.

Let's say we wanted to grab all the Box objects with width of 14:

```php
// assume we have 3 boxes
$boxes = $xpdo->getCollection('Box', [
  'width' => 14,
]);
foreach ($boxes as $box) {
   echo $box->get('color')."\n";
}
// If our 3 boxes had a color of 'red','blue' and 'yellow', this would print:
// red
// blue
// yellow
```

### [xPDO::getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")

`xPDO::getIterator` is identical to `xPDO::getCollection` except that only one `xPDOObject` is accessible at a time. Use `getCollection` if you need all objects at once; use `getIterator` for better memory efficiency when looping.

The code for iterating over the Box objects with width of 14 is almost identical to that of `getCollection`:

```php
// assume we have 3 boxes, with colors 'red','blue' and 'yellow'
$boxes = $xpdo->getIterator('Box', [
  'width' => 14,
]);
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

One of the most powerful parts of xPDO is its ability to create complex queries using the [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") wrapper. This class lets you build SQL queries using OOP methods that extend the `xPDOCriteria` class — you can pass its instance right into getObject or getCollection calls. The newQuery function creates an [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") object, and takes 3 parameters:

-   `$class` - The class name to create the query for.
-   `$criteria` - Optional; you can specify criteria here.
-   `$cacheFlag` - Similar to getObject's cacheFlag, you can specify the caching behavior for this query.

First, let's use newQuery to define the criteria we used before: width = 14, with sorting:

```php
$c = $xpdo->newQuery('Box');
$c->where(['width' => 14]);
$c->sortby('name', 'ASC');
$boxes = $xpdo->getCollection('Box',$c);
```

> **Important**: do not allow untrusted user input directly into the `$c->sortby()` method. The order accepts `ASC`, `DESC`, `ASCENDING`, or `DESCENDING`. The column is checked against a list of allowed SQL clauses; a value that contains `;`, `UNION`, `sleep()` or `benchmark()` is rejected and logged, so it cannot be injected. Still, validate the column yourself when it comes from user input.

Next, let's use the query to join on a related table using [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). This example grabs the first 5 Boxes with width of 5 and an owner of ID 2, sorted by name. Our "Box" table has a many-to-many relationship with the "BoxOwner" table.

```php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // arguments are className, alias
$c->where([
    'width' => 5,
    'Owner.user' => 2,
]);
$c->sortby('name','ASC');
$c->limit(5);
$boxes = $xpdo->getCollection('Box',$c);
```

We can join on a 3rd table ("User") by using another call to [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"). The 2nd 5 Boxes are grabbed by specifying an offset — it's a 2nd argument to the limit() function:

```php
$c = $xpdo->newQuery('Box');
$c->innerJoin('BoxOwner','Owner'); // arguments are: className, alias
$c->innerJoin('User','User','Owner.user = User.id');
// note the 3rd argument that defines the relationship in the innerJoin
$c->where([
    'Box.width' => 5,
    'User.user' => 2,
]);
$c->sortby('Box.name','ASC');
$c->limit(5, 5); // limit, offset
$boxes = $xpdo->getCollection('Box',$c);
```

The sortby and where functions can take dot syntax on their parameters; they can prefix their columns with alias — sometimes they have to do this to prevent collisions!

More information on [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery") can be found [here](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery").

The xml schema can be found in your MODX installation's core folder: model/schema/modx.mysql.schema.xml (helpful to get classNames, aliases, etc for your queries)

#### Debugging

As the ORM layer takes care of the queries and doesn't expose them to you normally, if things don't work as expected it may be useful to get access to what xPDO will actually ask of the database. The following code can be used to show the SQL for an xPDOQuery:

```php
$c = $xpdo->newQuery('Box');
// ... add some more criteria...
$c->prepare();
print $c->toSQL();
```

## Graphs

A "graph" extends the idea of an object (or objects in collections). Instead of a simple object, a graph includes references to related objects. Graphs are a useful alternative to JOINs.

### xPDO::getObjectGraph

This is the same as getCollectionGraph, but it returns a single object. See getCollectionGraph below for info.

### xPDO::getCollectionGraph

```php
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

> **Aliases in JSON**: Remember that the JSON hash passed to `getObjectGraph` or `getCollectionGraph` needs to use _aliases_, not class names.

You have direct access to all of the fields (table rows) in the Collection Graph comprised in these four tables. The alias is used to create the graph. In this example, the 'Zip' table is the primary table, so we look at that table and we define relationships from the perspective of that primary table.

As with getObject and getCollection, we can supply a `$criteria` object to getCollectionGraph. Let's add some criteria to our `getCollectionGraph()` query. In this example, we can search for zipcodes in California (CA)

```php
$criteria = $modx->newQuery('Zip');
$criteria->where(['ST.statename' => 'CA']);
$collection = $xpdo->getCollectionGraph('Zip', '{"TZ":{},"ST":{},"CT":{}}', $criteria);
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

> **Aliases in Criteria**: The table names you specify in your criteria must use the _aliases_, not the class names (just like the JSON hashes).

Let's show one more example, this time using MODX tables. This is only an example: filtering on Template Variables is a bit dangerous because the values stored in the database are not always the verbatim values you experience in the manager or in your templates. But this example should help demonstrate the usage of aliases and that you must be aware of the relationships between the objects (some related objects are singular, some are arrays).

```php
$criteria = [];
$criteria['modResource.id:IN'] = [1,2,3];
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

-   [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
-   [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
-   [getCollectionGraph](extending-modx/xpdo/retrieving-objects/graphs "getCollectionGraph")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
-   [xPDO.newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
-   [xPDO.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDO.where")

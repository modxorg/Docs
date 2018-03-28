---
title: "PHP Coding in MODx Revolution, Pt. II"
_old_id: "1117"
_old_uri: "2.x/case-studies-and-tutorials/php-coding-in-modx-revolution,-pt.-i/php-coding-in-modx-revolution,-pt.-ii"
---

- [Creating Objects](#PHPCodinginMODxRevolution%2CPt.II-CreatingObjects)
- [Removing an Object](#PHPCodinginMODxRevolution%2CPt.II-RemovinganObject)
- [More Complex Queries](#PHPCodinginMODxRevolution%2CPt.II-MoreComplexQueries)
- [See Also](#PHPCodinginMODxRevolution%2CPt.II-SeeAlso)



In this article, we'll talk about creating and removing objects (and their respective rows in the database), as well as more complex queries.

## Creating Objects

Object creation is handled by the **newObject** method. It assumes that the object you are trying to create has been properly defined inside your XML schema and that schema has generated the proper class files. For a simple example, we can look at the built-in MODX objects.

``` php 
// let's create a Template
$template = $modx->newObject('modTemplate');

// now, lets save some data into the fields
$template->set('templatename','TestTemplate');
$template->set('description','A test template.');

// we could have also done it like this:
$data = array(
        'templatename' => 'TestTemplate',
        'description' => 'A test template.',
);
$template->fromArray($data);

// okay, now we're ready. let's save.
if ($template->save() === false) {
        die('An error occurred while saving!');
}
```

A row is never actually added to the database until the object's save() command is run.

## Removing an Object

To remove an object from the database, we use the **remove** command:

``` php 
$template->remove();
```

This will also remove any composite relationships defined in the object's schema. In the previous example with modTemplates, these are the modTemplateVarTemplate objects, which map Templates to TVs. Those will cascade and be removed.

## More Complex Queries

Okay, so pretty soon you are going to need to do some more complex queries than we've dealt with. That's where the xPDOQuery object comes in. This allows you to build abstract query objects that emulate more advanced SQL commands. So, lets try to grab the third 10 resources (so 21-30), ordered by menuindex, that are either 1) published and searchable, or 2) created by the user with username 'george123'.

``` php 
$c = $modx->newQuery('modResource');
$c->leftJoin('modUser','PublishedBy');
$c->where(array(
        'modResource.published' => 1,
        'modResource.searchable' => 1,
));
$c->orCondition(array(
        'PublishedBy.username' => 'george123',
),null,1);
$c->sortby('menuindex','ASC');
$c->limit(10,20);

$resources = $modx->getCollection('modResource',$c);
```

A couple of things to note. One, note that innerJoin first passes the class name, then the alias. And in orCondition, the 3rd parameter is the group number, which effectively groups the conditions into proper parenthesis (the first 2 in the first parenthetical group, the 3rd in another).

[xPDOQuery](/xpdo/2.x/class-reference/xpdoquery "xPDOQuery") supports the the methods: join, [rightJoin](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.rightjoin "xPDOQuery.rightJoin"), [leftJoin](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.leftjoin "xPDOQuery.leftJoin"), [innerJoin](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"), [andCondition](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.andcondition "xPDOQuery.andCondition"), [orCondition](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.orcondition "xPDOQuery.orCondition"), [sortby](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.sortby "xPDOQuery.sortby"), [groupby](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.groupby "xPDOQuery.groupby"), [limit](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.limit "xPDOQuery.limit"), bindGraph, bindGraphNode, and [select](/xpdo/2.x/class-reference/xpdoquery/xpdoquery.select "xPDOQuery.select").

Obviously, you can go pretty wild here with complex queries. The nice thing about xPDO in MODx is that there's really a ton of different ways to do most things - you could also have used [$modx->getCollectionGraph](/xpdo/2.x/getting-started/using-your-xpdo-model/retrieving-objects/getcollectiongraph "getCollectionGraph") for this as well.

In the [next article](case-studies-and-tutorials/php-coding-in-modx-revolution,-pt.-i/php-coding-in-modx-revolution,-pt.-iii "PHP Coding in MODx Revolution, Pt. III"), we'll talk about how this is used in the context of MODx processors with JSON.

## See Also

- [xPDO: Creating Objects](/xpdo/2.x/getting-started/using-your-xpdo-model/creating-objects "Creating Objects")
- [xPDOObject::remove](/xpdo/2.x/class-reference/xpdoobject/persistence-methods/remove "remove")
- [xPDOQuery](/xpdo/2.x/class-reference/xpdoquery "xPDOQuery")
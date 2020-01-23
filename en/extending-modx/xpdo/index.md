---
title: "xPDO"
_old_id: "341"
_old_uri: "2.x/developing-in-modx/basic-development/xpdo"
note: "This page is a stub. You can help by expanding it."
---

xPDO is the object-relational-bridge that is built into MODX. Simply put, it's how MODX connects to the database, and how it interacts with different tables.

In MODX 2.x, the `modX` class directly extends `xPDO`. While in hindsight that's not the best development pattern, it does mean that whenever you have access to the `modX` instance, you can use any of the `xPDO` methods on it as well.

## What is xPDO?

xPDO is our name for open eXtensions to PDO. It's a light-weight ORB (object-relational bridge) library that works on PHP 5 and 7, and takes advantage of the standard for database persistence in PHP, PDO. It implements the very simple, but effective Active Record pattern for data access, as well as a flexible domain model that allows you to isolate domain logic from database-specific logic, or not, depending on your needs.

## Glossary

In the context of xPDO, the following terms are important to know:

- **Packages** are collections of models. In the MODX core, all models are part of the `modx` package, plus there are a few sub-packages like `modx.media` and `modx.package`. To make xPDO aware of the models in a package, it needs to be registered with `$xpdo->addPackage()`.
- **Models** are classes that represent a specific database table. They are the abstraction you will use most often; rather than interacting with SQL directly, you load a model, adjust its properties, and save it.
- **Schemas** are XML files that define the different models that are available in a package, and what their fields (properties) are. They are used only in development, during which they will be processed (typically called being "built") into the model classes and maps.
- **Maps** are PHP files containing arrays that define the metadata for packages and schemas. They are in the database driver-specific model directory (e.g. `model/modx/mysql/modresource.map.inc.php`). These files are not typically managed manually, instead they are generated from a schema file.

There are a lot more things to learn about xPDO, but if you understand these 4 you have a solid foundation to make sense of the rest of the documentation.

## Kitchen Sink example

On the various subpages, you can learn a lot more about different ways of dealing with data in xPDO. If you're more about code, the example below will show you a variety of xPDO interactions.

````php
if (!$modx->addPackage('education', '/path/to/model/')) {
   die('Can\'t load package, try again later.');
}

// Get into Harvard (or create a new school with the same name)
$school = $modx->getObject('School', ['name' => 'Harvard']);
if (!$school) {
    $school = $modx->newObject('School');
    $school->set('name', 'Harvard');
    $school->save();
}

// Find the 100 students that are alumni and sort by lastname
$c = $modx->newQuery('Student');
$c->where([
    'school' => $school->get('id'),
    'is_alumni' => true,
    'start_year' => $_GET['start_year'] ?? date('Y') - 5,
]);
$c->sortby('lastname', 'ASC');
$c->limit(100);

foreach ($modx->getIterator('Student', $c) as $student) {
    echo $student->get('firstname') . ' ' . $student->get('lastname') . ' started studying in ' . $student->get('start_year');

    if ($graduation = $student->getOne('Graduation')) {
        echo ' and graduated in ' . $graduation->get('year') . ".\n";
    }
    else {
        echo " and has not graduated.\n";
    }
}
````

Some notes about the above code:

- It's purely hypothetical, there is no package/model code for you to use.
- On line 6 we're specifying conditions to load the `School` object as an array. You can also provide an integer to get the object by its primary key, provide an xPDOQuery, or provide raw SQL. Always be explicit about the type of condition you set; cast to `int` if you use the primary key (especially if it comes from user input), or provide the array syntax.
- On line 14 we're creating a new `xPDOQuery` instance for our `Student` model. This is the query builder. The variable name `$c`, short for condition, is fairly common for instances of xPDOQuery. xPDOQuery can do conditions, joins, sorting, and a lot more. To debug a generated query, you can add `$c->prepare(); echo $c->toSQL();`.
- On line 18 we're using `$_GET` data without applying any sanitisation. Luckily for us, xPDO uses prepared statements so you are automatically protected from SQL Injections _when using the query builder_.
- Line 23, 26 and 29 use echo to return data. You should never (rarely) do that in real code. Ideally you'd provide the data (`$student->toArray()`) to a template (like a chunk, with `$modx->getChunk()` which is a modX method, not xPDO) to keep your data and markup separate.
- Line 25 uses the `getOne()` method to get a related object. The relation has to be defined in the model. Instead of `getOne`, you could also refer to the relation directly (`$student->Graduation`) which will be lazy loaded, or (assuming the `Graduation` model has a field `student` containing the student ID) you could have used `$modx->getObject('Graduation', ['student' => $student->get('id')])`.

Take a look at the various subsections to learn more about specific aspects of xPDO.

## Easy to Understand Patterns

But xPDO is a little more than a simple pattern implementation. It's also a way to abstract business objects from the actual SQL queries and prepared statements used to access a relational database structure representing them, and a way to easily describe and provide optimized implementations of an object model for multiple target database platforms.

When developing **xPDO** uses several design patterns that are well described in Martin Fowler’s book [«Enterprise Software Architecture»](http://design-pattern.ru/patterns) [«Patterns of Enterprise Application Architecture»](http://www.martinfowler.com/eaaCatalog/). Among them are the following and not only:

* Domain Model
* Active Record
* Data Mapper
* Lazy Load
* Identity Field
* Single Table Inheritance
* Metadata Mapping
* Query Object

Before programming using **xPDO** it will be very useful to familiarize yourself with these patterns (and others from the Fowler catalog). An understanding of these concepts will help not only in learning **xPDO**, but in many other things related to programming.

## Why it Was Created

xPDO was inspired by the need to quickly provide scaffolding for a web application that is easy to extend into a full-blown object model that could be optimized as much as possible for the database platform it was being deployed on without creating platform-dependencies, or maintenance nightmares. And it needed to provide this with as small a code footprint as possible; implementing an effective object-relational persistence framework in PHP demands this.

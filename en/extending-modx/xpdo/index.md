---
title: "xPDO"
_old_id: "341"
_old_uri: "2.x/developing-in-modx/basic-development/xpdo"
note: "This page is a stub. You can help by expanding it."
---

xPDO is the object-relational-bridge that is built into MODX. Simply put, it's how MODX connects to the database, and how it interacts with different tables.

In MODX 2.x and 3.x, the `modX` class extends `xPDO`, so any time you have the `modX` instance you can call xPDO methods on it. In MODX 3 that parent is the namespaced `xPDO\xPDO` class loaded through Composer. For upgrade and Extra migration details, see [Upgrading to MODX 3](../getting-started/upgrading-to-3.0/ "Upgrading to MODX 3").

## What is xPDO?

xPDO is our name for open eXtensions to PDO. It's a light-weight ORB (object-relational bridge) library that requires PHP 8.1+, and takes advantage of the standard for database persistence in PHP, PDO. It implements the very simple, but effective Active Record pattern for data access, as well as a flexible domain model that allows you to isolate domain logic from database-specific logic, or not, depending on your needs.

## Glossary

In the context of xPDO, the following terms are important to know:

- **Packages** are collections of models. In the MODX 3 core, models live under namespaces such as `MODX\Revolution` (plus sub-packages like Sources and Transport). Register a package with `$xpdo->addPackage()` (and a `$namespacePrefix` when you use PSR-4).
- **Models** are classes that represent a specific database table. They are the abstraction you will use most often; rather than interacting with SQL directly, you load a model, adjust its properties, and save it.
- **Schemas** are XML files that define the different models that are available in a package, and what their fields (properties) are. They are used only in development, during which they will be processed (typically called being "built") into the model classes and maps. In MODX 3 set `version="3.0"` and put the PHP namespace in the `package` attribute.
- **Maps** are PHP metadata for packages and schemas. In MODX 3 / xPDO 3 a package ships `metadata.{dbtype}.php` (with a `class_map`) plus platform files under a driver folder (for example `mysql/`). Older 2.x docs often show only `*.map.inc.php` files; regenerate with schema `version="3.0"` when you target MODX 3.

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
- The `where()` call uses array syntax, which triggers prepared statements and protects against SQL injection. Raw SQL string criteria are inserted as-is — never pass user input as a string criterion.
- To debug a generated query, add `$c->prepare(); echo $c->toSQL();`.
- Line 25 uses `getOne()` to fetch a related object. The relation must be defined in the model. You can also access it directly (`$student->Graduation`) for lazy loading.



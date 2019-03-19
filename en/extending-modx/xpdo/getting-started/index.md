---
title: "Getting started with xPDO"
---

## Design Patterns

There are a number of important design patterns that inspired the development of xPDO. These patterns are well described and are a part of Martin Fowler's _Patterns of Enterprise Application Architecture (P of EAA)_. These include, but are certainly not limited to the following:

- Domain Model
- Active Record
- Data Mapper
- Lazy Load
- Identity Field
- Single Table Inheritance
- Metadata Mapping
- Query Object

It would be a good idea to at least become familiar with these patterns (and the others in the catalog) before jumping into coding with xPDO; understanding these concepts will help everything else fall into place as you begin learning more about xPDO.

## xPDO as PDO Wrapper

PDO is the standard data access layer for PHP, and it's capabilities are at the core of what xPDO is all about. An instance of PDO essentially represents a connection to a database, and by wrapping a PDO instance, essentially making it a "service" object, xPDO can provide a rich buffer between your object model and the persistence services responsible for handling all database communication.

And though it doesn't extend PDO directly, it does provide the same methods as PDO, which allows xPDO to mediate all database calls. This makes it possible to use result set caching and other advanced techniques to optimize how your applications interact with the database (i.e. by caching db results to file or memory, you can avoid even making the database connection if everything requested is found in the cache).

Finally, by simply extending xPDO yourself, you can further customize the class to serve the purposes you need it to. For instance, you can add domain-specific methods or extend core methods in your derivative and use instances as a central domain object for interacting with your model. This is how the MODx Revolution 2.0 Content Management System was built; the central class: modX, extends xPDO and adds the methods that form the MODx application domain.

You'll start off by extending the class like so:

``` php 
class myClass extends xPDO
```

and then define a constructor method:

``` php 
function __construct($options = array()) {
    $options = array(
        xPDO::OPT_CACHE_PATH => '/path/to/my/cache/dir',
        xPDO::OPT_TABLE_PREFIX => 'myprefix_',
        xPDO::OPT_HYDRATE_FIELDS => true,
        xPDO::OPT_HYDRATE_RELATED_OBJECTS => true,
        xPDO::OPT_HYDRATE_ADHOC_FIELDS => true,
        xPDO::OPT_VALIDATE_ON_SAVE => true,
    );
    parent :: __construct(
        'mysql:host=localhost;dbname=myxpdodb;charset=utf8',
        'username',
        'password',
        $options,
        array (
            PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
            PDO::ATTR_PERSISTENT => false,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
        )
    );
    $this->setPackage('mypackage', 'path/to/my/model/');
}
```

There's a lot in there. You can find more information on the constructor here: [The xPDO Constructor](extending-modx/xpdo/create-xpdo-instance "The xPDO Constructor").

## xPDO as Service Layer

In addition to PDO, xPDO can wrap other objects you may want to work with alongside your model.

For example, you could manually load smarty as an object that you can call directly from your xPDO instance:

``` php 
if ($className= $xpdo->loadClass('Smarty','/path/to/smarty/smarty.class.php', false, true)) {
    $xpdo->smarty= & new $className ($xpdo);
}

$xpdo->smarty->someFunc();
```

But xPDO provides a convenience method for doing this in a single line:

``` php 
if ($xpdo->getService('myService', 'myServiceClass', '/path/to/model/root/', array('param1' => $param1, 'param2' => $param2)) {
    $xpdo->myService->doSomething();
}
```

If the service instance has already been loaded in the current request, it will not be loaded again, but simply returned. This creates a simple way to provide reusable service objects for common tasks.

## xPDO as ORM

As a PDO wrapper, xPDO can now easily use its PDO service for interacting with your relational model. Once you define an object model and generate the scaffolding classes and object/relational maps that provide the information xPDO needs, you can use its methods to interact with your objects in a great number of ways. 

We'll explore these methods in-depth in the Custom Models section.


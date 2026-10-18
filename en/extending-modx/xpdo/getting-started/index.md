---
title: "Getting started with xPDO"
---

## xPDO as PDO Wrapper

PDO is the standard data access layer for PHP. xPDO wraps a PDO instance as a service object, providing a buffer between your object model and the database. Though it doesn't extend PDO directly, it provides the same methods, mediating all database calls and enabling result set caching.

By extending xPDO, you can add domain-specific methods or extend core methods. This is how MODX itself is built: `modX` extends xPDO and adds the methods that form the MODX application domain.

``` php
class myClass extends \xPDO\xPDO
```

``` php
function __construct(array $options = []) {
    $options = array_merge($options, [
        xPDO::OPT_CACHE_PATH => '/path/to/my/cache/dir',
        xPDO::OPT_TABLE_PREFIX => 'myprefix_',
        xPDO::OPT_HYDRATE_FIELDS => true,
        xPDO::OPT_HYDRATE_RELATED_OBJECTS => true,
        xPDO::OPT_HYDRATE_ADHOC_FIELDS => true,
        xPDO::OPT_VALIDATE_ON_SAVE => true,
    ]);
    parent::__construct(
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

More on the constructor: [The xPDO Constructor](extending-modx/xpdo/create-xpdo-instance "The xPDO Constructor").

## xPDO as Service Layer

xPDO can wrap other objects alongside your model. Use `getService()` to load and call them:

``` php
if ($xpdo->getService('myService', 'myServiceClass', '/path/to/model/root/', array('param1' => $param1, 'param2' => $param2)) {
    $xpdo->myService->doSomething();
}
```

If the service is already loaded in the current request, it is returned as-is.

**Note:** `getService()` is deprecated since xPDO 3.0 and will be removed in 3.1. Use the DI container to access services instead.

## xPDO as ORM

Once you define an object model and generate the scaffolding classes and maps, xPDO's methods let you interact with your objects in many ways. See [Custom Models](extending-modx/xpdo/custom-models).

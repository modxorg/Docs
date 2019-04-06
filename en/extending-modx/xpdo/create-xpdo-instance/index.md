---
title: "Creating xPDO Instance"
_old_id: "1216"
_old_uri: "2.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor"
---

When using xPDO within MODX, the `modX` class (typically available as `$modx` or `$this->modx`) is an instance of xPDO so you do not need to create a separate instance.

When using xPDO standalone, or if you want to create additional instances, use the information on this page.

The constructor has the following signature:

``` php
$xpdo= new xPDO($dsn, $username= '', $password= '', $options= array(), $driverOptions= null)
```

## Parameters

As you can see, there are 5 parameters available in the constructor; the only necessary one is the first:

### $dsn

This parameter asks you for your DSN value, which is formatted like so:

> mysql:host=MYHOSTNAME;dbname=MYDBNAME;charset=MYCHARSET

You'll simply have to change the values of the hostname, database name, and charset to set up the parameter. More info can be found at [PHP.net's PDO](http://php.net/manual/en/pdo.construct.php) page.

### $username and $password

This is the username and password to the database. Simply specify the database login information you'd like to use for xPDO's connections.

### $options

This allows you to pass an array of xPDO-specific options into the constructor.

Some of the xPDO-specific parameters use custom defines that you can use, such as (but not limited to):

- **xPDO::OPT\_BASE\_CLASSES** — An array of classes to load upon instantiation.
- **xPDO::OPT\_BASE\_PACKAGES** — A comma-separated string of package names/paths (separated by a colon) to be loaded upon instantiation.
- **xPDO::OPT\_CACHE\_COMPRESS** — If set, any xPDOCache instances using providers that support compressing data will use that option by default.
- **xPDO::OPT\_CACHE\_DB** — If set, database result set caching will be enabled.
- **xPDO::OPT\_CACHE\_DB\_COLLECTIONS** — If set, database result set caching will attempt to cache entire collections.
- **xPDO::OPT\_CACHE\_DB\_OBJECTS\_BY\_PK** — If set, database result set caching will create cache entries by primary key in addition to the query signature used.
- **xPDO::OPT\_CACHE\_DB\_EXPIRES** — If set, defines the number of seconds a database result set cache entry is valid in the cache; 0 means it does not expire.
- **xPDO::OPT\_CACHE\_DB\_HANDLER** — If set, defines an xPDOCache derivative to handle database result set caching.
- **xPDO::OPT\_CACHE\_EXPIRES** — If set, defines the number of seconds a cache entry is valid in any cache provider by default; 0 means it does not expire.
- **xPDO::OPT\_CACHE\_FORMAT** — If set, defines the format cache files are stored in when using xPDOFileCache; the default is PHP, but JSON and serialized are available. _(2.1 only)_
- **xPDO::OPT\_CACHE\_KEY** — If set, defines the key of the default cache instance; the default value is _default_.
- **xPDO::OPT\_CACHE\_PATH** — If set, will set a custom cachePath class variable to the xPDO object that can be used in caching.
- **xPDO::OPT\_CACHE\_ATTEMPTS** — If set, defines the number attempts xPDOFileCache will attempt to lock an existing cache entry for writing; default is 1. _(2.1 only)_
- **xPDO::OPT\_CACHE\_ATTEMPT\_DELAY** — If set, defines the number microseconds to delay each attempt to lock existing cache entries for writing; default is 10000. _(2.1 only)_
- **xPDO::OPT\_CONNECTIONS** — Optionally defines a pool of [additional connections](http://rtfm.modx.com/display/xPDO20/Database+Connections+and+xPDO#DatabaseConnectionsandxPDO-DefiningMultipleConnections%28xPDO2.2%29) to select from when instantiating xPDO. _(2.2 only)_
- **xPDO::OPT\_CONN\_INIT** — Defines options a connection must have to be selected as the initial connection; applicable when multiple connections are defined. _(2.2 only)_
- **xPDO::OPT\_CONN\_MUTABLE** — Defines if data from a connection can be changed, i.e. is writable. _(2.2 only)_
- **xPDO::OPT\_HYDRATE\_FIELDS** — If true, fields will be [hydrated](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields").
- **xPDO::OPT\_HYDRATE\_RELATED\_OBJECTS** — If true, related objects will be [hydrated](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields").
- **xPDO::OPT\_HYDRATE\_ADHOC\_FIELDS** — If true, ad-hoc fields will be [hydrated](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields").
- **xPDO::OPT\_LOADER\_CLASSES** — Can be an array of class names to load upon instantiation of the xPDO object. _(deprecated in 2.0.0-pl)_
- **xPDO::OPT\_ON\_SET\_STRIPSLASHES** — If set, stripslashes() is applied to values being set() on xPDOObject instances.
- **xPDO::OPT\_TABLE\_PREFIX** — If set, all database class references will be prefixed with this prefix.
- **xPDO::OPT\_VALIDATOR\_CLASS** — If set, will use a custom class specified that derives from xPDOValidator _(the default)_
- **xPDO::OPT\_VALIDATE\_ON\_SAVE** — If true, xPDOObjects will be validated against their Validators before saving.

### $driverOptions

An optional array of driver-specific PDO options. More info can be found [here](http://us.php.net/manual/en/pdo.drivers.php).

## See Also

- [PDO::\_\_construct()](http://php.net/manual/en/pdo.construct.php)
- [Caching](extending-modx/xpdo/caching "Caching")
- [Database Connections and xPDO](extending-modx/xpdo/create-xpdo-instance/connections "Database Connections and xPDO")
- [Hydrating Fields](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields")
- [Object Validation](extending-modx/xpdo/custom-models/validation "Object Validation")
- [Using Custom Object Loaders](xpdo/extending-your-xpdo-model/overriding-derived-behavior/using-custom-object-loaders "Using Custom Object Loaders")

### More information about options

1. [Hydrating Fields](extending-modx/xpdo/create-xpdo-instance/hydrating-fields)

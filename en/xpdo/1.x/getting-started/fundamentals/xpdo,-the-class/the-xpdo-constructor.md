---
title: "The xPDO Constructor"
_old_id: "1563"
_old_uri: "1.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor"
---

Parameters
----------

As you can see, there are 5 parameters available in the constructor; the only necessary one is the first:

### $dsn

This parameter asks you for your DSN value, which is formatted like so:

> mysql:host=MYHOSTNAME;dbname=MYDBNAME;charset=MYCHARSET

You'll simply have to change the values of the hostname, database name, and charset to set up the parameter. More info can be found at [PHP.net's PDO](http://us.php.net/manual/en/pdo.construct.php) page.

### $username & $password

This is the username and password to the database. Simply specify the database login information you'd like to use for xPDO's connections.

### $options

This allows you to pass an array of xPDO-specific options into the constructor.

Some of the xPDO-specific parameters use custom defines that you can use, such as (but not limited to):

- **XPDO\_OPT\_TABLE\_PREFIX** - If set, all database class references will be prefixed with this prefix.
- **XPDO\_OPT\_CACHE\_PATH** - If set, will set a custom cachePath class variable to the xPDO object that can be used in caching.
- **XPDO\_OPT\_HYDRATE\_FIELDS** - If true, fields will be hydrated.
- **XPDO\_OPT\_HYDRATE\_RELATED\_OBJECTS** - If true, related objects will be hydrated.
- **XPDO\_OPT\_HYDRATE\_ADHOC\_FIELDS** - If true, ad-hoc fields will be hydrated.
- **XPDO\_OPT\_BASE\_PACKAGES** - A comma-separated string of package names/paths (separated by a colon) to be loaded upon instantiation.
- **XPDO\_OPT\_BASE\_CLASSES** - An array of classes to load upon instantiation.
- **XPDO\_OPT\_LOADER\_CLASSES** - Can be an array of class names to load upon instantiation of the xPDO object.
- **XPDO\_OPT\_VALIDATOR\_CLASS** - If set, will use a custom class specified that derives from xPDOValidator (the default)
- **XPDO\_OPT\_VALIDATE\_ON\_SAVE** - If true, xPDOObjects will be validated against their Validators before saving.

### $driverOptions

An optional array of driver-specific PDO options. More info can be found [here](http://us.php.net/manual/en/pdo.drivers.php).

See Also
--------

1. [Hydrating Fields](/xpdo/1.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor/hydrating-fields)
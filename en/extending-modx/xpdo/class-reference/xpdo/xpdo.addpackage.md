---
title: "xPDO.addPackage"
_old_id: "1233"
_old_uri: "2.x/class-reference/xpdo/xpdo.addpackage"
---

## xPDO::addPackage

This is used to load up the xPDO ORM mapping classes that define your package's objects. The MODX convention is that these classes are stored in your package's "model/" directory. Loading these classes allows xPDO to interact with your custom object and by extension the database tables they represent. The functionality is keyed off of the **metadata.inc.php** file in the referenced directory (`$path + $pkg`). This meta data is how MODX knows how which classnames are active and whether any classes extend core classes. The end result is a bit similar to an Autoload function.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO:addPackage()>

``` php
boolean addPackage ([string $pkg = ''], [string $path = ''], [string $tablePrefix = ''])
```

- `$pkg` corresponds to the name of a sub-folder within the specified $path. The sub-folder contains the myriad _your\_table.class.php_ files and most often a _mysql_ sub-folder which contains additional map and class files, e.g. _your\_table.class.php_ and _your\_table.map.inc.php_
- `$path` is the full path to the folder containing the packages, including the package name you referenced in the first argument.
- `$tablePrefix` is the table prefix for your package. You MUST include contain the correct prefix when **addPackage** is called (i.e. at runtime), otherwise your package will not load correctly!

---

**Note:** database table prefix `$tablePrefix` for your package **have to** match common MODX DB table prefix, otherwise you can get far-reaching error consequences. The MODX prefix can be and sometimes needs to be changed (f.e. for [Hardening MODX Revolution](getting-started/maintenance/securing-modx#changing-default-database-prefixes) needs), the main thing to remember is that package prefix and MODX one should be both equal. If you do not really understand what is at stake, do not specify this parameter `$tablePrefix`, in this case the default prefix value `_modx` will be used. 

---

This function returns **true** on success and **false** on error. Check the logs on error.

## Example

Most commonly, this uses the `MODX_CORE_PATH` constant and points to your package's "model/" directory:

``` php
$modx->addPackage('mypkg',MODX_CORE_PATH.'components/mypkg/model/','mypkg_');
```

## Another Example

Pictured is the file structure of the FormIt Snippet.

![](Path_to_models.jpg)

If you were to load one of its packages using the addPackage() method, you could use one of the three available packages (formit, recaptcha, or stopforumspam) as the first argument, and the path to the containing folder as the second argument, e.g.

``` php
$xpdo->addPackage('recaptcha', MODX_CORE_PATH.'components/formit/model/');
```

## Testing

``` php
$xpdo->setLogLevel(xPDO::LOG_LEVEL_INFO);
$xpdo->setLogTarget('ECHO');
if (!$xpdo->addPackage('my_package','/path/to/docroot/core/components/my_package/model/','pkg_')) {
    print 'There was a problem adding your package.';
}
```

The $path (2nd argument), must exist, or an error will be logged. But if the 1st argument (the $pkg) is not a sub-folder inside the $path, no error is thrown.

On fail, this function will write verbose error messages to the log.

## Adding Packages from other Databases

The addPackage() method works on any instantiated xPDO object that has valid class and map files. If you need to connect to a different database, instantiate a new instance of xPDO using valid login criteria, e.g. as described here: [Database Connections and xPDO](extending-modx/xpdo/create-xpdo-instance/connections "Database Connections and xPDO")

## Creating Tables

It's not enough to just load up the package and its PHP classes. If your package defines database tables, you may have to create the tables. This is normally done for you when you install a package, but if you're doing things manually, you'll want to look at the [xPDOManager.createObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createobjectcontainer "xPDOManager.createObjectContainer") function.

## See Also

- [xPDO](extending-modx/xpdo "xPDO")
- [Loading Packages](extending-modx/xpdo/custom-models/loading-package "Loading Packages")

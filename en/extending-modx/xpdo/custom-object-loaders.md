---
title: "Using Custom Object Loaders"
_old_id: "1222"
_old_uri: "2.x/extending-your-xpdo-model/overriding-derived-behavior/using-custom-object-loaders"
---

## Change the Way xPDO Loads Data

You can provide any of the following static methods in your custom xPDOObject derivative classes to override their behavior, including in driver-specific classes:

- \_loadRows
- \_loadInstance
- \_loadCollectionInstance
- load
- loadCollection
- loadCollectionGraph

This is done with the help of the \[xPDO::call()\] method.

Overriding these methods allows you to implement additional behavior or completely change the behavior of loading your table objects via the object and collection methods provided by [xPDO](extending-modx/xpdo "xPDO") and [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject"). For instance, it can be used to perform security checks or to add i18n processing before allowing a row to be loaded.

## < 2.0

Prior to 2.0.0-pl, you can specify custom loader classes that extend or override the behavior of the default object loaders by specifying these classes in the xPDO options array when instantiating an xPDO instance.
 
``` php 
$xpdo = new xPDO($dsn, $username, $password, array(
    xPDO::OPT_LOADER_CLASSES => array('myCustomLoaderClass')
));
```

---
title: "Using Custom Loader Classes"
_old_id: "1221"
_old_uri: "2.x/class-reference/xpdoobject/static-object-loaders/using-custom-loader-classes"
---

You can provide any of the following static methods in your custom xPDOObject derivative classes to override their behavior, including in driver-specific classes:

- \_loadRows
- \_loadInstance
- \_loadCollectionInstance
- load
- loadCollection
- loadCollectionGraph

This is done with the help of the `xPDO::call()` method.

Overriding these methods allows you to implement additional behavior or completely change the behavior of loading your table objects via the object and collection methods provided by [xPDO](extending-modx/xpdo "xPDO") and [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject"). For instance, it can be used to perform security checks or to add i18n processing before allowing a row to be loaded.

In xPDO 3.x, the `xPDO::call()` method is used to invoke these static methods on the appropriate class. You can override the behavior by defining these methods in your model classes.

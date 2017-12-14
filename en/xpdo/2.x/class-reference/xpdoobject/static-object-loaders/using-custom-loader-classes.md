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

This is done with the help of the <span class="error">\[xPDO::call()\]</span> method.

Overriding these methods allows you to implement additional behavior or completely change the behavior of loading your table objects via the object and collection methods provided by [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO") and [xPDOObject](/xpdo/2.x/class-reference/xpdoobject "xPDOObject"). For instance, it can be used to perform security checks or to add i18n processing before allowing a row to be loaded.

<div class="note">Prior to 2.0.0-pl, you can specify custom loader classes that extend or override the behavior of the default object loaders by specifying these classes in the xPDO options array when instantiating an xPDO instance. ```
<pre class="brush: php">
$xpdo = new xPDO($dsn, $username, $password, array(
    xPDO::OPT_LOADER_CLASSES => array('myCustomLoaderClass')
));

```</div>
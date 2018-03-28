---
title: "extension_packages"
_old_id: "109"
_old_uri: "2.x/administering-your-site/settings/system-settings/extension_packages"
---

## extension\_packages

 **Name**: Extension Packages 
**Type**: String (a JSON encoded array of key value pairs) 
**Default**: Yes

 Use this setting to autoload packages that extend core classes, e.g. if you are extending modUser. The format should be a JSON array of key/value pairs where the key is the namespace (i.e. the package name) and the value is the path to its model.

 This effect here is similar to other frameworks, e.g. CodeIgniter, which allows core classes to be overridden via use of a special classname prefix "MY\_".

 Use this only when you are extending core classes that are used during **initialize()** 

### Sample value

 ``` php 

[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}},{"articles":{"path":"[[++core_path]]components/articles/model/"}}]

```

 You can make use of the

 ``` php 

[[++core_path]]

```

 placeholders.

### Another Example

 If your extension uses a different table prefix, you should list this in your JSON by using the **tablePrefix** key, e.g.

 ``` php 

[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/","tablePrefix":"ext_"}},{"articles":{"path":"[[++core_path]]components/articles/model/"}}]

```

## Related Functions

 At some point in the recent version history, the `addExtensionPackage` and `removeExtensionPackage` convenience functions were added to facilitate adding and removing data to the **extension\_packages** setting.

### addExtensionPackage

 ``` php 

boolean addExtensionPackage ([string $pkg = ''], [string $modelpath = ''], [array $options = array()])

```

 The $pkg argument really specifies a subfolder in the named model directory. In most packages, this name is the same as the package's namespace, but other packages may specify multiple sub-folders in their model. Note that the $options array can specify a "tablePrefix" key, e.g.

 ``` php 

$modx->addExtensionPackage('mypkg', '/path/to/core/components/mypkg/model/', array('tablePrefix'=>'mypre_'));

```

### removeExtensionPackage

When it's time to clean up, remove your node from the **extension\_packages** array using this convenience function:

 ``` php 

boolean removeExtensionPackage (string $pkg = '')

```
---
title: "extension_packages"
_old_id: "109"
_old_uri: "2.x/administering-your-site/settings/system-settings/extension_packages"
---

## extension\_packages

**Name**: Extension Packages
**Type**: String (a JSON encoded array of key/value pairs)
**Default**: (empty)

Use this setting to autoload packages that extend core classes, for example when you extend `modUser`. The format is a JSON array of key/value pairs. The key is the namespace (the package name); the value is the path to its model.

The setting is not part of the install transport. It is created automatically the first time `addExtensionPackage()` is called, so a fresh install has no `extension_packages` row until a package registers itself.

The effect is similar to other frameworks, such as CodeIgniter, that allow core classes to be overridden with a special class-name prefix (`MY_`).

Use this only when you are extending core classes that are used during **initialize()**.

### Sample value

```json
[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/"}},{"articles":{"path":"[[++core_path]]components/articles/model/"}}]
```

You can use the `[[++core_path]]` placeholder.

### Another example

If your extension uses a different table prefix, list it with the **tablePrefix** key:

```json
[{"extendeduser":{"path":"[[++core_path]]components/extendeduser/model/","tablePrefix":"ext_"}},{"articles":{"path":"[[++core_path]]components/articles/model/"}}]
```

## Related functions

The `addExtensionPackage` and `removeExtensionPackage` convenience functions add and remove entries in the **extension_packages** setting.

### addExtensionPackage

```php
boolean addExtensionPackage ([string $pkg = ''], [string $modelpath = ''], [array $options = array()])
```

The `$pkg` argument specifies a subfolder in the named model directory. In most packages this is the same as the package namespace, but a package may have multiple subfolders in its model. The `$options` array can specify a `tablePrefix` key:

```php
$modx->addExtensionPackage('mypkg', '/path/to/core/components/mypkg/model/', array('tablePrefix'=>'mypre_'));
```

### removeExtensionPackage

Remove your entry from the **extension_packages** array with:

```php
boolean removeExtensionPackage (string $pkg = '')
```

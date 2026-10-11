---
title: "modX.addExtensionPackage"
description: "Stores an extension package in the extension_packages system setting"
---

## modX::addExtensionPackage

Writes a package entry into the [extension_packages](building-sites/settings/extension_packages) system setting, creating the setting first when it does not exist. The stored value is a JSON array: each entry maps a package name to its options and stores the path under the `path` key.

The package loads on the next initialization, not in the running request: the settings cache must be refreshed first. Then `initialize()` reads the setting, expands path tokens such as `[[++core_path]]` and calls `xPDO::addPackage()`.

The package classes become available to `loadClass()`, `newObject()` and `getTableName()`. `serviceName` and `serviceClass` go to `xPDO::getService()`, which is itself deprecated in favour of the service container.

The core marked the setting-based store deprecated in 2.3; `modExtensionPackage` records replace it. The code still announces a removal that never happened, so the setting keeps working in this version.

## Syntax

``` php
boolean addExtensionPackage (string $name, string $path, [array $options = array()])
```

- `$name` _(string)_ package name, used as the key of the entry
- `$path` _(string)_ directory that holds the package model
- `$options` _(array)_ `tablePrefix`, `serviceName` and `serviceClass` values, by default `array()`

## Example

``` php
$modx->addExtensionPackage('mypkg', MODX_CORE_PATH . 'components/mypkg/model/', array(
    'tablePrefix' => 'mypkg_',
));
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.removeExtensionPackage](extending-modx/modx-class/reference/modx.removeextensionpackage)
- [extension_packages](building-sites/settings/extension_packages)

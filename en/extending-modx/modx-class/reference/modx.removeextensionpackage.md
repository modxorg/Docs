---
title: "modX.removeExtensionPackage"
description: "Deletes an extension package entry from the extension_packages system setting"
---

## modX::removeExtensionPackage

Reads the `extension_packages` system setting, drops the entry whose package key equals `$name` and writes the setting back. Nothing changes in a running request: the package stops loading on the next initialization.

Returns false when the setting does not exist or no entry matched `$name`, otherwise it returns the save result.

## Syntax

``` php
boolean removeExtensionPackage (string $name)
```

- `$name` _(string)_ package name as stored in the setting

## Example

``` php
$removed = $modx->removeExtensionPackage('mypkg');
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.addExtensionPackage](extending-modx/modx-class/reference/modx.addextensionpackage)
- [extension_packages](building-sites/settings/extension_packages)

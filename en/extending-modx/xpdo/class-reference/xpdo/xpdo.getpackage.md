---
title: "xPDO.getPackage"
description: "Get the package name a class belongs to."
_old_id: "1830"
_old_uri: "2.x/class-reference/xpdo/xpdo.getpackage"
---

## xPDO::getPackage

Returns the name of the package a class belongs to, based on its fully-qualified name. Returns `null` if the class is not part of a registered package.

## Syntax

``` php
string|null getPackage (string $className)
```

## Example

``` php
$package = $xpdo->getPackage('MODX\\Revolution\\modResource');
// 'MODX\\Revolution'
```

## See Also

- [xPDO.getAlias](extending-modx/xpdo/class-reference/xpdo/xpdo.getalias "xPDO.getAlias")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
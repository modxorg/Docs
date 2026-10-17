---
title: "xPDO.getAlias"
description: "Get the alias of a class."
_old_id: "1831"
_old_uri: "2.x/class-reference/xpdo/xpdo.getalias"
---

## xPDO::getAlias

Returns the alias of a class: the last segment of its namespace, without the namespace prefix. For example, the alias of `MODX\Revolution\modResource` is `modResource`.

## Syntax

``` php
string|null getAlias (string $className)
```

## Example

``` php
$alias = $xpdo->getAlias('MODX\\Revolution\\modResource');
// 'modResource'
```

## See Also

- [xPDO.getPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.getpackage "xPDO.getPackage")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
---
title: "xPDO.getInherit"
description: "Get the inheritance type of a class."
_old_id: "1834"
_old_uri: "2.x/class-reference/xpdo/xpdo.getinherit"
---

## xPDO::getInherit

Returns the inheritance mode of a class: `'single'` for single-table inheritance (derivative classes stored in the same table and distinguished by `class_key`), `'multiple'` for class-table inheritance, or an empty string when the class does not inherit.

## Syntax

``` php
string getInherit (string $className)
```

## Example

``` php
$inherit = $xpdo->getInherit('modResource');
// 'single'
```

## See Also

- [xPDO.addDerivativeCriteria](extending-modx/xpdo/class-reference/xpdo/xpdo.addderivativecriteria "xPDO.addDerivativeCriteria")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
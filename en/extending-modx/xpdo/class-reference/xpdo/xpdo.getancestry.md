---
title: "xPDO.getAncestry"
description: "Get the parent classes of a class."
_old_id: "1837"
_old_uri: "2.x/class-reference/xpdo/xpdo.getancestry"
---

## xPDO::getAncestry

Returns an array of the class names a class extends, from the class itself up to `xPDOObject`. By default the class itself is included; pass `false` as the second argument to start from its parent. Returns an empty array if the class cannot be loaded.

## Syntax

``` php
array getAncestry (string $className, [boolean $includeSelf = true])
```

## Example

``` php
$ancestry = $xpdo->getAncestry('MODX\\Revolution\\modResource');
// array('MODX\\Revolution\\modResource', 'xPDO\\Om\\xPDOObject')
```

## See Also

- [xPDO.getPK](extending-modx/xpdo/class-reference/xpdo/xpdo.getpk "xPDO.getPK")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
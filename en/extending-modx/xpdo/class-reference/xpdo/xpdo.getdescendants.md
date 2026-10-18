---
title: "xPDO.getDescendants"
description: "Get the classes that extend a given class."
_old_id: "1862"
_old_uri: "2.x/class-reference/xpdo/xpdo.getdescendants"
---

## xPDO::getDescendants

Returns an array of the fully-qualified class names that extend the given class, based on the loaded class map.

## Syntax

``` php
array getDescendants (string $className)
```

## Example

``` php
$descendants = $xpdo->getDescendants('MODX\\Revolution\\modResource');
```

## See Also

- [xPDO.getAncestry](extending-modx/xpdo/class-reference/xpdo/xpdo.getancestry "xPDO.getAncestry")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
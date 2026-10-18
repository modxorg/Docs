---
title: "xPDOCriteria.bind"
description: "Bind values to the criteria."
_old_id: "1887"
_old_uri: "2.x/class-reference/xpdobjectcriteria/xpdobjectcriteria.bind"
---

## xPDOCriteria::bind

Binds an array of values to the criteria, either by value or by reference. After binding, the criteria can be prepared and executed.

## Syntax

``` php
xPDOCriteria bind ([array $bindings = array()], [boolean $byValue = true], [boolean $cacheFlag = false])
```

## Example

``` php
$criteria->bind(array(':id' => 42));
```

## See Also

- [xPDOCriteria.toSQL](extending-modx/xpdo/class-reference/xpdocriteria/xpdocriteria.tosql "xPDOCriteria.toSQL")
- [xPDOCriteria](extending-modx/xpdo/class-reference/xpdocriteria "xPDOCriteria")
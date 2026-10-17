---
title: "xPDOCriteria.equals"
description: "Compare this criteria with another object."
_old_id: "1888"
_old_uri: "2.x/class-reference/xpdobjectcriteria/xpdobjectcriteria.equals"
---

## xPDOCriteria::equals

Compares this criteria with another object. Returns `true` when the other object is a criteria with the same SQL and bindings, `false` otherwise.

## Syntax

``` php
boolean equals (mixed $obj)
```

## Example

``` php
if ($criteriaA->equals($criteriaB)) {
    // identical SQL and bindings
}
```

## See Also

- [xPDOCriteria](extending-modx/xpdo/class-reference/xpdocriteria "xPDOCriteria")
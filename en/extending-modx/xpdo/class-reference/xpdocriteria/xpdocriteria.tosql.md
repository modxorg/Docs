---
title: "xPDOCriteria.toSQL"
description: "Get the SQL string for the criteria."
_old_id: "1889"
_old_uri: "2.x/class-reference/xpdobjectcriteria/xpdobjectcriteria.tosql"
---

## xPDOCriteria::toSQL

Returns the SQL string for the criteria. When `$parseBindings` is true (the default), the bound values are substituted into the SQL; when false, the placeholders are left in place.

## Syntax

``` php
string toSQL ([boolean $parseBindings = true])
```

## Example

``` php
echo $criteria->toSQL();
```

## See Also

- [xPDOQuery.prepare](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.prepare "xPDOQuery.prepare")
- [xPDOCriteria](extending-modx/xpdo/class-reference/xpdocriteria "xPDOCriteria")
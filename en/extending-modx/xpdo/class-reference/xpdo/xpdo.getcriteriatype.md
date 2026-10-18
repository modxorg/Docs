---
title: "xPDO.getCriteriaType"
description: "Get the type of a criteria object."
_old_id: "1819"
_old_uri: "2.x/class-reference/xpdo/xpdo.getcriteriatype"
---

## xPDO::getCriteriaType

Returns the type of a given criteria value: `'object'` when the criteria resolves to a single object (a primary key value or a compound key array), and `'collection'` otherwise.

## Syntax

``` php
string getCriteriaType (mixed $criteria)
```

## Example

``` php
$type = $xpdo->getCriteriaType(42);
// 'object'

$type = $xpdo->getCriteriaType(array('name' => 'John'));
// 'collection'
```

## See Also

- [xPDO.getCriteria](extending-modx/xpdo/class-reference/xpdo/xpdo.getcriteria "xPDO.getCriteria")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
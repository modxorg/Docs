---
title: "xPDO.getCriteria"
description: "Get a predefined criteria object for a class."
_old_id: "1818"
_old_uri: "2.x/class-reference/xpdo/xpdo.getcriteria"
---

## xPDO::getCriteria

Converts a predefined criteria definition (declared on a class) into an `xPDO\Om\xPDOCriteria` instance. The `$type` argument selects which predefined criteria to load — by convention `'object'` and `'collection'` are used for retrieving a single instance and multiple instances.

## Syntax

``` php
xPDO\Om\xPDOCriteria|null getCriteria (string $className, [string $type = null], [boolean|integer $cacheFlag = true])
```

## Example

``` php
$criteria = $xpdo->getCriteria('modResource', 'collection');
```

## See Also

- [xPDO.getCriteriaType](extending-modx/xpdo/class-reference/xpdo/xpdo.getcriteriatype "xPDO.getCriteriaType")
- [xPDO.newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
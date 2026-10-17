---
title: "xPDO.lastInsertId"
description: "Get the ID of the last inserted row."
_old_id: "1856"
_old_uri: "2.x/class-reference/xpdo/xpdo.lastinsertid"
---

## xPDO::lastInsertId

Returns the ID of the last row inserted into the database by the current connection, or `false` if no insert has occurred. For tables with a sequence, the sequence name may be passed as an argument.

## Syntax

``` php
string|boolean lastInsertId ([string $name = null])
```

## Example

``` php
$id = $xpdo->lastInsertId();
```

## See Also

- [xPDOObject.save](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save "xPDOObject.save")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
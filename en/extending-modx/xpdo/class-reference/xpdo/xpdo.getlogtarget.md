---
title: "xPDO.getLogTarget"
description: "Get the current log target."
_old_id: "1849"
_old_uri: "2.x/class-reference/xpdo/xpdo.getlogtarget"
---

## xPDO::getLogTarget

Returns the current log target of the xPDO instance — a string such as `ECHO`, `HTML` or `FILE`, or an array describing a custom target.

## Syntax

``` php
string|array getLogTarget ()
```

## Example

``` php
$target = $xpdo->getLogTarget();
```

## See Also

- [xPDO.setLogTarget](extending-modx/xpdo/class-reference/xpdo/xpdo.setlogtarget "xPDO.setLogTarget")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
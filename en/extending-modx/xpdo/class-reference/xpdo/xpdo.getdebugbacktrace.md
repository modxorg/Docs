---
title: "xPDO.getDebugBacktrace"
description: "Get a backtrace of the current call stack."
_old_id: "1850"
_old_uri: "2.x/class-reference/xpdo/xpdo.getdebugbacktrace"
---

## xPDO::getDebugBacktrace

Returns a backtrace of the current call stack, used by xPDO when logging at debug level. The format and depth of the trace depend on the debug settings of the instance.

## Syntax

``` php
array getDebugBacktrace ()
```

## Example

``` php
$trace = $xpdo->getDebugBacktrace();
```

## See Also

- [xPDO.getDebug](extending-modx/xpdo/class-reference/xpdo/xpdo.getdebug "xPDO.getDebug")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
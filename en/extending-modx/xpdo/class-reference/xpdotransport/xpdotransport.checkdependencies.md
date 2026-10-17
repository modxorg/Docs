---
title: "xPDOTransport.checkDependencies"
_old_id: "1935"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.checkdependencies"
---

## xPDOTransport::checkDependencies

Checks whether the dependencies declared by the transport are satisfied. Returns `true` when all required packages are present, otherwise an array describing the missing ones.

## Syntax

``` php
boolean|array checkDependencies ([array $options = array()])
```

## Example

``` php
if ($transport->checkDependencies() !== true) {
    // missing dependencies
}
```

## See Also

- [xPDOTransport.getDependencies](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.getdependencies "xPDOTransport.getDependencies")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
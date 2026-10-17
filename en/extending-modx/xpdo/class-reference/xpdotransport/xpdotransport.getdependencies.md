---
title: "xPDOTransport.getDependencies"
_old_id: "1934"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.getdependencies"
---

## xPDOTransport::getDependencies

Returns the list of packages and PHP versions this transport requires. Use this to check that a package can be installed before calling [install()](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.install "xPDOTransport.install").

## Syntax

``` php
array getDependencies ([array $requires = array()])
```

## Example

``` php
$deps = $transport->getDependencies();
```

## See Also

- [xPDOTransport.checkDependencies](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.checkdependencies "xPDOTransport.checkDependencies")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
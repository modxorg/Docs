---
title: "xPDOTransport.checkPlatformDependencies"
_old_id: "1936"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.checkplatformdependencies"
---

## xPDOTransport::checkPlatformDependencies

Checks whether the PHP version and required extensions listed in the dependencies are available. Returns `true` when the platform requirements are met, otherwise an array describing what is missing.

## Syntax

``` php
boolean|array checkPlatformDependencies (array $dependencies)
```

## Example

``` php
$missing = xPDOTransport::checkPlatformDependencies(array(
    'php' => '>=8.1',
    'extensions' => array('pdo_mysql', 'json'),
));
```

## See Also

- [xPDOTransport.getDependencies](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.getdependencies "xPDOTransport.getDependencies")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
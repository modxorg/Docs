---
title: "xPDOTransport.registerVehicle"
_old_id: "1931"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.registervehicle"
---

## xPDOTransport::registerVehicle

Registers a vehicle with the transport. A vehicle defines how an artifact is installed or uninstalled — for example, copying a file, running a PHP script, or preserving an existing file.

## Syntax

``` php
boolean registerVehicle (xPDO\Transport\xPDOTransportVehicle &$vehicle)
```

## Example

``` php
$vehicle = $xpdo->newObject('xPDOFileVehicle');
$transport->registerVehicle($vehicle);
```

## See Also

- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
---
title: "xPDOTransport.put"
_old_id: "1927"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.put"
---

## xPDOTransport::put

Adds an artifact to the transport. The artifact is a file on disk; its attributes describe how it should be installed (target path, vehicle, preservation rules).

## Syntax

``` php
boolean put (string $artifact, [array $attributes = array()])
```

## Example

``` php
$transport->put(MODX_CORE_PATH . 'components/my_package/model/myclass.class.php', array(
    'vehicle' => 'xPDOFileVehicle',
    'target' => 'return MODX_CORE_PATH . "components/my_package/model/";',
));
```

## See Also

- [xPDOTransport.get](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.get "xPDOTransport.get")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
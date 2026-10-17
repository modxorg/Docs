---
title: "xPDOTransport.setAttribute"
_old_id: "1933"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.setattribute"
---

## xPDOTransport::setAttribute

Sets an attribute of the transport, such as its signature or version.

## Syntax

``` php
boolean setAttribute (string $key, mixed $value)
```

## Example

``` php
$transport->setAttribute('signature', 'my_package-1.0.0-pl');
```

## See Also

- [xPDOTransport.getAttribute](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.getattribute "xPDOTransport.getAttribute")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
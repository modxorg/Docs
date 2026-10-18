---
title: "xPDOTransport.getAttribute"
_old_id: "1932"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.getattribute"
---

## xPDOTransport::getAttribute

Gets an attribute of the transport, such as its signature or version.

## Syntax

``` php
mixed getAttribute (string $key)
```

## Example

``` php
$signature = $transport->getAttribute('signature');
```

## See Also

- [xPDOTransport.setAttribute](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.setattribute "xPDOTransport.setAttribute")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
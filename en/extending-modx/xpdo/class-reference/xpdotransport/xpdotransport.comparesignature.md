---
title: "xPDOTransport.compareSignature"
_old_id: "1940"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.comparesignature"
---

## xPDOTransport::compareSignature

Compares two package signatures and returns `-1`, `0` or `1` depending on whether the first is lower than, equal to, or higher than the second.

## Syntax

``` php
integer compareSignature (string $signature1, string $signature2)
```

## Example

``` php
$result = xPDOTransport::compareSignature('my_package-1.0.0-pl', 'my_package-1.0.0-beta');
```

## See Also

- [xPDOTransport.parseSignature](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.parsesignature "xPDOTransport.parseSignature")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
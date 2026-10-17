---
title: "xPDOTransport.parseSignature"
_old_id: "1939"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.parsesignature"
---

## xPDOTransport::parseSignature

Parses a package signature into its components: vendor, package name, version, and release index.

## Syntax

``` php
array|false parseSignature (string $signature)
```

## Example

``` php
$parts = xPDOTransport::parseSignature('my_vendor-my_package-1.0.0-pl');
// array('name' => 'my_package', 'version' => '1.0.0', 'release' => 'pl')
```

## See Also

- [xPDOTransport.compareSignature](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.comparesignature "xPDOTransport.compareSignature")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
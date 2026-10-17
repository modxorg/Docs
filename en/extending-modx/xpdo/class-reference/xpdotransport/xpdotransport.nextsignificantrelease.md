---
title: "xPDOTransport.nextSignificantRelease"
_old_id: "1938"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.nextsignificantrelease"
---

## xPDOTransport::nextSignificantRelease

Given a version, returns the next significant release — for example, the next minor or major version depending on the operator. Used when computing upgrade paths between transport versions.

## Syntax

``` php
string nextSignificantRelease (string $version)
```

## Example

``` php
$next = xPDOTransport::nextSignificantRelease('1.2.3');
```

## See Also

- [xPDOTransport.satisfies](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.satisfies "xPDOTransport.satisfies")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
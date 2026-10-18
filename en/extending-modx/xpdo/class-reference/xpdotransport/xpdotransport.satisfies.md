---
title: "xPDOTransport.satisfies"
_old_id: "1937"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.satisfies"
---

## xPDOTransport::satisfies

Checks whether a version satisfies a version constraint, using semantic-versioning style operators such as `>=`, `<`, `~` and `*`.

## Syntax

``` php
boolean satisfies (string $version, string $constraint)
```

## Example

``` php
if (xPDOTransport::satisfies($installed, '>=1.0.0')) {
    // constraint met
}
```

## See Also

- [xPDOTransport.nextSignificantRelease](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.nextsignificantrelease "xPDOTransport.nextSignificantRelease")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
---
title: "xPDOTransport.manifestVersion"
_old_id: "1943"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.manifestversion"
---

## xPDOTransport::manifestVersion

Reads the version recorded in a transport manifest array. Returns the version string, or `null` if the manifest does not contain one.

## Syntax

``` php
string|null manifestVersion (array $manifest)
```

## Example

``` php
$version = xPDOTransport::manifestVersion($manifest);
```

## See Also

- [xPDOTransport.writeManifest](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.writemanifest "xPDOTransport.writeManifest")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
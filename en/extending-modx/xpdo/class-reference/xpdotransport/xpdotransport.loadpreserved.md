---
title: "xPDOTransport.loadPreserved"
_old_id: "1930"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.loadpreserved"
---

## xPDOTransport::loadPreserved

Loads the list of files that should be preserved (not overwritten) when the transport is installed or uninstalled.

## Syntax

``` php
array loadPreserved ()
```

## Example

``` php
$preserved = $transport->loadPreserved();
```

## See Also

- [xPDOTransport.writePreserved](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.writepreserved "xPDOTransport.writePreserved")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
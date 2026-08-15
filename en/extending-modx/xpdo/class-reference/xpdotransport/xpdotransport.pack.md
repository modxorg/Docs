---
title: "xPDOTransport.pack"
_old_id: "1304"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.pack"
---

## xPDOTransport::pack

Pack the [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport") instance in preparation for distribution. This packs the transport into a zip file in the target directory.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_transport_xpdotransport.class.html#\xPDOTransport::pack()>

``` php
boolean pack ()
```

## Example

Package the transport into a zip file.

``` php
$transport->pack();
```

## See Also

- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
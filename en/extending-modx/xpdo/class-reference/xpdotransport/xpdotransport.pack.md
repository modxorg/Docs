---
title: "xPDOTransport.pack"
_old_id: "1304"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.pack"
---

## xPDOTransport::pack

Pack the [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport") instance in preparation for distribution. This packs the transport into a zip file in the target directory.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/transport/xPDOTransport.html#pack>

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
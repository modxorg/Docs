---
title: "xPDOTransport.get"
_old_id: "1926"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.get"
---

## xPDOTransport::get

Retrieves an artifact from the transport archive. The artifact is identified by its file path inside the archive; the returned value is an array describing it and its contents.

## Syntax

``` php
array|boolean get (string $objFile, [array $options = array()])
```

## Example

``` php
$artifact = $transport->get('my_package/model/my_package/myclass.class.php');
```

## See Also

- [xPDOTransport.put](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.put "xPDOTransport.put")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
---
title: "xPDOTransport::__construct"
_old_id: "1925"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.construct"
---

## xPDOTransport::__construct

Creates a transport instance. The signature identifies the package and the path is the directory that contains (or will contain) the transport archive.

## Syntax

``` php
__construct (xPDO &$xpdo, string $signature, string $path, [array $options = array()])
```

- `$signature` — the package signature, in the form `vendor-package-1.0.0-pl`.
- `$path` — the directory the transport archive is read from or written to.

## Example

``` php
$transport = $manager->getTransport('my_package', MODX_CORE_PATH . 'packages/');
```

## See Also

- [xPDOManager.getTransport](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.gettransport "xPDOManager.getTransport")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
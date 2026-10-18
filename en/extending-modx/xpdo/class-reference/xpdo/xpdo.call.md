---
title: "xPDO.call"
description: "Call a method on a class, loading it if needed."
_old_id: "1865"
_old_uri: "2.x/class-reference/xpdo/xpdo.call"
---

## xPDO::call

Calls a static or instance method on a class, loading the class first if necessary. This is the mechanism used to dispatch to custom loader classes and other model methods.

## Syntax

``` php
mixed call (string $class, string $method, [array $args = array()], [boolean $transient = false])
```

- `$class` — the class to call the method on.
- `$method` — the method name.
- `$args` — arguments passed to the method.
- `$transient` — when true, the class is not loaded permanently.

## Example

``` php
$result = $xpdo->call('MyVendor\\MyPackage\\MyModel', 'myStaticMethod', array($arg));
```

## See Also

- [Using Custom Object Loaders](extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/using-custom-loader-classes "Using Custom Object Loaders")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
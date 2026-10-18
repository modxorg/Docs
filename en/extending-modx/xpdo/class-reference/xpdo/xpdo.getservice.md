---
title: "xPDO.getService"
description: "Load and get a service object."
_old_id: "1860"
_old_uri: "2.x/class-reference/xpdo/xpdo.getservice"
---

## xPDO::getService

Loads a service class and returns an instance of it, or the already-loaded instance when the service has been requested before in the current request.

> [!WARNING]
> `getService()` is deprecated since xPDO 3.0 and will be removed in 3.1. Access services through the dependency injection container instead.

## Syntax

``` php
object|boolean getService (string $name, [string $class = ''], [string $path = ''], [array $params = array()])
```

- `$name` — the name the service is stored under.
- `$class` — the class name of the service.
- `$path` — the path to the class file.
- `$params` — constructor parameters for the service.

## Example

``` php
$service = $xpdo->getService('myService', 'myServiceClass', '/path/to/model/root/', array('param1' => $param1));
```

## See Also

- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
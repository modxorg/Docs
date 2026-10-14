---
title: "modX.getInstance"
description: "Creates or returns a registered modX instance"
---

## modX::getInstance

Create, retrieve or update modX instances. This is the standard way to get a `modX` object: every MODX entry point uses it and registers the result in the shared instance registry.

## Syntax

``` php
static modX getInstance ([string|int|null $id = null], [array|null $config = null], [boolean $forceNew = false])
```

- `$id` _(string|int|null)_ Identifier of the instance. When omitted, the existing instance is returned if there is one; otherwise a new id is generated and a new instance is created.
- `$config` _(array|null)_ Config data for the instance. Passing it with an `$id` that already exists merges the values into that instance's config; passing it without an `$id` forces the creation of a new instance.
- `$forceNew` _(boolean)_ Force the creation of a new instance even if one with the given `$id` already exists.

Returns the `modX` instance; throws `xPDOException` if the registry entry is not a valid instance.

Registering matters: an object created with `new \MODX\Revolution\modX()` runs, but it is **not** stored in the registry. The next `getInstance()` call — from an entry point, setup or a test — then builds a second instance with its own database connection and config. Use `getInstance()` everywhere.


## Example

Load MODX externally through the instance registry:

``` php
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH . 'vendor/autoload.php';

$modx = \MODX\Revolution\modX::getInstance();
$modx->initialize('web');
```

## See Also

- [Loading MODX Externally](extending-modx/modx-class/loading-externally "Loading MODX Externally")
- [modX](extending-modx/core-model/modx "modX")

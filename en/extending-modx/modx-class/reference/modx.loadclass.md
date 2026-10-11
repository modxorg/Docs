---
title: "modX.loadClass"
description: "Resolves a legacy class name to a PSR-4 class, with an xPDO fallback"
---

## modX::loadClass

**Deprecated since 3.0** — reference `MODX\Revolution\*` classes directly and let the PSR-4 autoloader load them.

The name is resolved in this order:

1. A namespaced name that already exists is returned unchanged.
2. A plain or dotted name such as `modx.modChunk` is mapped onto `MODX\Revolution\`. The old name gets a `class_alias()` when it is missing, a deprecation is recorded, and the PSR-4 name is returned.
3. When that guess fails, the method returns what `xPDO::loadClass()` answers: the class name or `false`.

A non-empty `$path` skips step 2. `$path`, `$ignorePkg` and `$transient` apply only in step 3.

## Syntax

``` php
bool|string loadClass (string $fqn, [string $path = ''], [bool $ignorePkg = false], [bool $transient = false])
```

- `$fqn` _(string)_ class name, plain, dotted or namespaced
- `$path` _(string)_ directory searched by `xPDO::loadClass()`, by default `''`
- `$ignorePkg` _(bool)_ skip the package search inside `xPDO::loadClass()`, by default `false`
- `$transient` _(bool)_ load without the metadata map inside `xPDO::loadClass()`, by default `false`

## Example

``` php
$class = $modx->loadClass('modx.modChunk');
// 'MODX\Revolution\modChunk'

$missing = $modx->loadClass('modMissingClass');
// false, and xPDO logs "Could not load class"
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.deprecated](extending-modx/modx-class/reference/modx.deprecated)

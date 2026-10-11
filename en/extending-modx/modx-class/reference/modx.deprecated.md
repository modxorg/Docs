---
title: "modX.deprecated"
description: "Records a deprecation notice for the calling method"
---

## modX::deprecated

Logs a deprecation notice for a method that is going away. Call it as the first line of that method: the backtrace identifies the deprecated definition and the code that called it.

The call is skipped when the `log_deprecated` option is off, and the option is on by default.

Notices stay in memory: one per definition, with callers accumulating. When the request shuts down they become `modDeprecatedMethod` rows. The manager lists them under Reports → Error Log, in the Deprecations Log panel.

## Syntax

``` php
void deprecated (string $since, [string $recommendation = ''], [string $deprecatedDef = ''])
```

- `$since` _(string)_ version in which the feature was deprecated
- `$recommendation` _(string)_ replacement advice, by default `''`
- `$deprecatedDef` _(string)_ name to record; by default `''` it is derived from the backtrace

## Example

``` php
function legacy_lookup($modx, $id)
{
    $modx->deprecated('3.1.0', 'Use $modx->getObject instead');

    return $modx->getObject(modResource::class, $id);
}
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.loadClass](extending-modx/modx-class/reference/modx.loadclass)
- [modX.messageQuit](extending-modx/modx-class/reference/modx.messagequit)

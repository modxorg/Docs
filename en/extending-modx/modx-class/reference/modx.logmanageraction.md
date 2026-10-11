---
title: "modX.logManagerAction"
description: "Writes a row to the manager action log"
---

## modX::logManagerAction

Creates and saves a `modManagerLog` record for one action. Processors call it right after they change an object, and the rows appear under Reports → Manager Actions.

Empty arguments are stored as:

| Argument | Stored as |
| --- | --- |
| `$action` | `'unknown'` |
| `$class_key` | `''` |
| `$item` | `'unknown'` |

The method returns the saved object, or `null` when the save fails after an error was logged.

## Syntax

``` php
modManagerLog|null logManagerAction (string $action, string $class_key, mixed $item, [int|null $userId = null])
```

- `$action` _(string)_ action key stored in the row
- `$class_key` _(string)_ class key of the affected object
- `$item` _(mixed)_ identifier stored as `item`
- `$userId` _(int|null)_ acting user; by default `null` uses the id of `modX::$user`

## Example

``` php
$log = $modx->logManagerAction('update_resource', modResource::class, 5);

if ($log === null) {
    // the row was not saved
}
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modResource](extending-modx/core-model/modresource)

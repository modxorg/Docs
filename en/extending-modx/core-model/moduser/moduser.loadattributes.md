---
title: "modUser.loadAttributes"
_old_id: "1348"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.loadattributes"
description: "Load the User's security attributes from the modAccess* tables"
---

## modUser::loadAttributes

Loads the attributes that define the User's security profile.

## Syntax

``` php
void loadAttributes (mixed $target, [string $context = ''], [boolean $reload = false])
```

| Parameter | Description |
| --- | --- |
| `$target` | One `modAccess*` class name or an array of them — not a Resource or Context class |
| `$context` | Context to load for; current Context by default |
| `$reload` | `true` — discard session-cached values; `false` (default) |

## Example

Load Resource Group permissions for the 'sports' Context:

``` php
$user->loadAttributes([\MODX\Revolution\modAccessResourceGroup::class], 'sports', true);
```

## See Also

- [modUser](extending-modx/core-model/moduser "modUser")

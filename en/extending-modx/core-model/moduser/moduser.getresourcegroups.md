---
title: "modUser.getResourceGroups"
description: "List the Resource Group ids granted to the User in a context"
---

## modUser::getResourceGroups

Returns the Resource Group ids the User can reach in the given context. An empty `$ctx` resolves to the current context key.

The values come from the session entry written by `modAccessResourceGroup::loadAttributes()`. A missing entry triggers a forced reload and a second read; without Resource Group access the array stays empty. The array holds ids, not names: `modResourceGroup::hasAccess()` compares them to the group id.

## Syntax

``` php
array getResourceGroups ([string $ctx = ''])
```

- `$ctx` _(string)_ Context key to check in, by default `''` (current context).

## Example

``` php
$groups = $user->getResourceGroups('web');
foreach ($groups as $groupId) {
    echo $groupId;
}
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.loadAttributes](extending-modx/core-model/moduser/moduser.loadattributes)

---
title: "modUser.getSettings"
_old_id: "1344"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.getsettings"
description: "Return the User's group settings overlaid with the User's own settings"
---

## modUser::getSettings

Returns the User's group settings overlaid with the User's own settings: `getUserGroupSettings()` first, then the UserSettings relation overwrites them.

## Syntax

``` php
array getSettings ()
```

## Example

``` php
$settings = $user->getSettings();
```

## See Also

- [modUser](extending-modx/core-model/moduser "modUser")

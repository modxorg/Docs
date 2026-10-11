---
title: "modUser.getPhoto"
description: "Resolve the avatar URL: profile photo, Gravatar or the given default"
---

## modUser::getPhoto

Resolves the avatar URL in a fixed order:

1. the profile photo, through `getProfilePhoto()` with the requested dimensions;
2. Gravatar, when the `enable_gravatar` setting is on; `getGravatar()` receives only the width;
3. otherwise the `$default` string, returned untouched.

## Syntax

``` php
string getPhoto ([integer $width = 128 [, integer $height = 128 [, string $default = '']]])
```

- `$width` _(integer)_ Photo width, by default `128`.
- `$height` _(integer)_ Photo height, by default `128`.
- `$default` _(string)_ Fallback URL, by default `''`.

## Example

``` php
echo $user->getPhoto(64, 64, '/assets/images/nophoto.png');
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.getProfilePhoto](extending-modx/core-model/moduser/moduser.getprofilephoto)
- [modUser.getGravatar](extending-modx/core-model/moduser/moduser.getgravatar)
- [enable_gravatar](building-sites/settings/enable_gravatar)

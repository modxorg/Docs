---
title: "modUser.getProfilePhoto"
description: "Build a phpthumb URL for the photo stored in the User profile"
---

## modUser::getProfilePhoto

Returns an empty string when the profile has no `photo`; otherwise it builds a phpthumb connector request with the photo path as `src`.

The media source id comes from the `photo_profile_source` setting, or from the default source when the setting is empty. The `zc` flag turns cropping on, so the image is cut to the requested box rather than letterboxed.

## Syntax

``` php
string getProfilePhoto ([integer $width = 128 [, integer $height = 128]])
```

- `$width` _(integer)_ Requested width, by default `128`.
- `$height` _(integer)_ Requested height, by default `128`.

## Example

``` php
echo $user->getProfilePhoto(32, 32);
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.getPhoto](extending-modx/core-model/moduser/moduser.getphoto)

---
title: "modUser.getGravatar"
description: "Compose the Gravatar avatar URL from the profile email"
---

## modUser::getGravatar

Trims and lowercases the profile email, hashes it with `md5()`, then appends the size and the fallback style to the Gravatar avatar path.

The method never looks at the `enable_gravatar` setting; that check lives in `getPhoto()`, so this call always produces a URL. It assumes a loaded profile with an email address.

## Syntax

``` php
string getGravatar ([integer $size = 128 [, string $default = 'retro']])
```

- `$size` _(integer)_ Image size in pixels, by default `128`.
- `$default` _(string)_ Gravatar fallback style, by default `retro`.

## Example

``` php
echo $user->getGravatar(64, 'identicon');
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.getPhoto](extending-modx/core-model/moduser/moduser.getphoto)
- [enable_gravatar](building-sites/settings/enable_gravatar)

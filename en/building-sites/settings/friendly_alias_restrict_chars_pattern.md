---
title: "friendly_alias_restrict_chars_pattern"
_old_id: "139"
_old_uri: "2.x/administering-your-site/settings/system-settings/friendly_alias_restrict_chars_pattern"
---

## friendly\_alias\_restrict\_chars\_pattern

**Name**: FURL Alias Character Restriction Pattern
**Type**: Textfield
**Default**: (See Below)
**Available In**: Revolution 2.0.6+

A valid RegEx pattern for restricting characters used in a Resource alias.

Default:

``` php
/[\0\x0B\t\n\r\f\a&=+%#<>"~:`@\?\[\]\{\}\|\^\'\\\\]/
```

If you add `.` here so aliases cannot contain periods, keep that change out of file uploads. With [upload_translit](building-sites/settings/upload_translit) enabled, MODX 3.1.0+ uses [upload_translit_restrict_chars_pattern](building-sites/settings/upload_translit_restrict_chars_pattern) for uploaded names. On 3.0.x the same FURL pattern also cleaned uploads, so a `.` in this setting turned `photo.jpg` into `photojpg`.
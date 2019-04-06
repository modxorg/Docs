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
---
title: 'upload_translit_restrict_chars_pattern'
description: 'RegEx used when upload_translit sanitizes uploaded file names, separate from Resource alias restrictions.'
---

## upload\_translit\_restrict\_chars\_pattern

**Name**: File Name Character Restriction Pattern
**Type**: Textfield
**Default**: (See Below)
**Available In**: MODX 3.1.0+

When [upload_translit](building-sites/settings/upload_translit) is **Yes**, Media Manager passes this RegEx into `filterPathSegment()` as the character-restriction pattern for the uploaded name. That keeps file naming independent of [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern).

If this setting is empty, uploads fall back to the Friendly URL restriction settings.

Default (same character class as the factory FURL pattern; **no** `.`):

``` php
/[\0\x0B\t\n\r\f\a&=+%#<>"~:`@\?\[\]\{\}\|\^\'\\\\]/
```

Do not add `.` to this pattern unless you want `report.pdf` saved as `reportpdf`. To strip dots from Resource aliases only, put `.` in [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern) and leave this upload pattern without it.

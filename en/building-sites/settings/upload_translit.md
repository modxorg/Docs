---
title: 'upload_translit'
description: 'Transliterate uploaded file names with the same path-segment rules used for Friendly URL aliases.'
---

## upload\_translit

**Name**: Transliterate names of uploaded files?
**Type**: Yes/No
**Default**: Yes
**Available In**: MODX 3.0+

When **Yes**, Media Manager (and other media-source uploads) run each file name through `modX::filterPathSegment()` before saving. That is the same sanitizer used for Resource aliases, so the result follows your [friendly_alias_translit](building-sites/settings/friendly_alias_translit) setup (including a Translitor / named transliteration table) plus word delimiters, length limits, and character restrictions.

### Missing dots in the file extension

If the active character-restriction pattern includes `.`, the sanitizer removes every period. `photo.jpg` becomes `photojpg`. Browsers may still open the file, but the Manager treats the extension as empty (delete/rename can fail with “file type is not allowed”).

That usually means `.` was added to [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern) so Resource aliases cannot contain dots. On MODX **3.1.0+**, set a separate pattern for uploads with [upload_translit_restrict_chars_pattern](building-sites/settings/upload_translit_restrict_chars_pattern) and leave `.` out of that pattern (the factory default does). On older 3.0.x builds, either remove `.` from the FURL pattern or set **upload_translit** to **No**.

Other Friendly URL options still apply to the whole name, including the extension. A low [friendly_alias_max_length](building-sites/settings/friendly_alias_max_length) can truncate `very-long-name.jpg` and drop the extension the same way.

### Related settings

- [upload_translit_restrict_chars_pattern](building-sites/settings/upload_translit_restrict_chars_pattern) (3.1.0+)
- [friendly_alias_translit](building-sites/settings/friendly_alias_translit)
- [friendly_alias_restrict_chars_pattern](building-sites/settings/friendly_alias_restrict_chars_pattern)
- [friendly_alias_max_length](building-sites/settings/friendly_alias_max_length)

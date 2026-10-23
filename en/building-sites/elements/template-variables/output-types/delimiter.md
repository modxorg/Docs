---
title: "Delimiter TV Output Type"
_old_id: "95"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/delimiter-tv-output-type"
---

## Delimiter TV Output Type

This output type splits the TV value on `||`, then joins the parts with the delimiter you set.

If you never save a delimiter, the separator is a comma.

**Check Box** and **Listbox (Multi-Select)** store `||`, so this output type can split them. **Tag** and **Auto-Tag** already store a comma-separated list. This output type does not split that list.

## Output Properties

| Name | Description |
| --- | --- |
| Delimiter | Characters placed between items. An unsaved property uses a comma. |

## See Also

1. [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
2. [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
3. [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
4. [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
5. [URL TV Output Type](building-sites/elements/template-variables/output-types/url)

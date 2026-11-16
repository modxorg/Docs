---
title: "HTML Tag TV Output Type"
_old_id: "161"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/html-tag-tv-output-type"
---

## HTML Tag TV Output Type

This output type wraps each part of the TV value in an HTML tag. It splits the stored value on `||`.

**Check Box** and **Listbox (Multi-Select)** store `||` between choices, so this output type splits them. **Tag** and **Auto-Tag** store a comma-separated list, so this output type does not split them.

## Output Properties

| Name | Description |
| --- | --- |
| Tag Name | Element name, such as `div` or `span`. If you leave it empty, the tag is `div`. |
| ID | Meant to be the `id` of the tag. It does not reach the tag. |
| Class | CSS class on the tag. |
| Style | CSS written into the `style` attribute. |
| Attributes | Extra HTML attributes. They do not reach the tag. |

> [!WARNING]
> **ID** and **Attributes** do not reach the tag. **Tag Name**, **Class**, and **Style** do. Build the extra attribute in a Snippet or an output filter.

## See Also

1. [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
2. [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
3. [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
4. [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
5. [URL TV Output Type](building-sites/elements/template-variables/output-types/url)

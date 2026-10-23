---
title: "URL TV Output Type"
_old_id: "323"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/url-tv-output-type"
---

## URL TV Output Type

This output type wraps the TV value in a link.

A whole number in the value becomes a link to that Resource, written as `[[~id]]`. Several values separated by `||` become several links, with `<br />` between them.

## Output Properties

| Name | Description |
| --- | --- |
| Display Text | Link text. If you leave it empty, the value is the link text. |
| Title | The `title` attribute. If you leave it empty, the link text is used. |
| ID | The `id` attribute. |
| Class(es) | CSS class on the link. |
| Style | CSS written into the `style` attribute. |
| Target | Where the link opens. The field starts at `_self`. The choices are `_blank`, `_self`, `_parent`, and `_top`. |
| Attributes | Extra HTML attributes. They do not reach the link. |

> [!WARNING]
> What you type in **Attributes** does not appear on the link. **Display Text**, **Title**, **ID**, **Class(es)**, **Style**, and **Target** do. There is no field on this output type that adds an arbitrary attribute.

## See Also

1. [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
2. [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
3. [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
4. [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
5. [URL TV Output Type](building-sites/elements/template-variables/output-types/url)

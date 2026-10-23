---
title: "Image TV Output Type"
_old_id: "162"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/image-tv-output-type"
---

## Image TV Output Type

This output type wraps the TV value in an `img` tag. Pair it with the Image input type.

## Output Properties

| Name | Description |
| --- | --- |
| Alternate Text | Text for the `alt` attribute. If you leave it empty, the tag still gets `alt=""`. |
| ID | Value of the `id` attribute. |
| Class | CSS class on the `img` tag. |
| Style | CSS written into the `style` attribute. |
| Attributes | Extra HTML attributes added to the tag. |

If the stored value looks like `label==path`, the image address is the label, the part before `==`. The path after `==` is not used as `src`. Store the path on its own when that path should be the image address.

## See Also

1. [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
2. [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
3. [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
4. [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
5. [URL TV Output Type](building-sites/elements/template-variables/output-types/url)

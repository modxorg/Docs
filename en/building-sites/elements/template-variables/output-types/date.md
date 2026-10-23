---
title: "Date TV Output Type"
_old_id: "92"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/template-variable-output-types/date-tv-output-type"
---

## Date TV Output Type

This output type prints the TV value as a date. The format string uses [strftime](https://www.php.net/strftime) symbols.

The Date output type and the `date` output filter both call `strftime`. From PHP 8.1 that writes a warning to the MODX log. PHP will remove the function in PHP 9. Format the date in a Snippet with `date()` instead.

## Output Properties

| Name | Description |
| --- | --- |
| Date Format | A [strftime](https://www.php.net/strftime) format string. The field starts at `%A %d, %B %Y`. |
| Use Current Date as Fallback | If the TV has no value, print the current time. The field starts at no, which prints nothing. |

## Examples

| Format String | Example Output |
| --- | --- |
| `%A %d, %B %Y` | Friday 01, April 2011 |
| `%Y-%m-%d` | 2011-04-01 |
| `%b %e, %Y` | Apr 1, 2011 |

## See Also

1. [Date TV Output Type](building-sites/elements/template-variables/output-types/date)
2. [Delimiter TV Output Type](building-sites/elements/template-variables/output-types/delimiter)
3. [HTML Tag TV Output Type](building-sites/elements/template-variables/output-types/html)
4. [Image TV Output Type](building-sites/elements/template-variables/output-types/image)
5. [URL TV Output Type](building-sites/elements/template-variables/output-types/url)

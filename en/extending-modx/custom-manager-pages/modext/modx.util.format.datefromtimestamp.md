---
title: "MODx.util.Format.dateFromTimestamp"
---

## MODx.util.Format.dateFromTimestamp

Available in MODX **3.x**. Turns a Unix timestamp into a string that follows the manager date and time formats from System Settings (`manager_date_format`, `manager_time_format`).

Use it in CMP grids and panels when you show file times or other Unix timestamps and want the same look as the core manager UI.

Defined in `manager/assets/modext/util/utilities.js` under `MODx.util.Format`.

## Parameters

| Name | Description | Default |
| ---- | ----------- | ------- |
| timestamp | Unix time. Ten-digit values are treated as seconds and converted to milliseconds. Values that are not greater than zero return `defaultValue`. | |
| date | When `true`, appends `MODx.config.manager_date_format`. | `true` |
| time | When `true`, appends `MODx.config.manager_time_format`. | `true` |
| defaultValue | Returned for invalid timestamps, or when both `date` and `time` are false. | `''` |

## Returns

A formatted date/time string from Ext's `Date.format`, or `defaultValue`.

Date and time parts join with a single space when both flags are true.

## Examples

Both date and time with manager formats:

```javascript
MODx.util.Format.dateFromTimestamp(1704067200);
```

Date only:

```javascript
MODx.util.Format.dateFromTimestamp(record.data.lastmod, true, false);
```

Fallback when the value is missing:

```javascript
MODx.util.Format.dateFromTimestamp(0, true, true, _('none'));
```

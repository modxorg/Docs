---
title: "manager_datetime_separator"
description: "Characters placed between the date and time when both are shown."
---

**Name**: Datetime Separator
**Type**: String
**Default**: `, ` (comma and space)

When a date and a time are displayed together, these characters are inserted between them. The combined format is `manager_date_format` + separator + `manager_time_format`.

The setting is used by `modManagerDateFormatter::formatDateTime()` and by date renderers in the manager (for example the resource publish/unpublish schedule grid).

See also: [`manager_date_format`](building-sites/settings/manager_date_format), [`manager_time_format`](building-sites/settings/manager_time_format).

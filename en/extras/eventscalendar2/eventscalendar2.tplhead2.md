---
title: "tplHead2"
_old_id: "839"
_old_uri: "revo/eventscalendar2/eventscalendar2.tplhead2"
---

- [Usage](#usage)
- [Placeholders](#placeholders)
- [See Also](#see-also)

## Usage

This chunk is a header of the calendar.

``` html
<tr>
    <td class="[[+ec.class_prev]]"><a href="[[+ec.link_prev]]">&larr;</a></td>
    <td class="[[+ec.class_month]]" colspan="5" style="text-align:center;"><strong>[[+ec.month_name]] [[+ec.year]]</strong></td>
    <td class="[[+ec.class_next]]"><a href="[[+ec.link_next]]">&rarr;</a></td>
</tr>
```

## Placeholders

| Name         | Description                              |
| ------------ | ---------------------------------------- |
| link\_prev   | Link to next month                       |
| link\_next   | Link to previous month                   |
| class\_prev  | CSS classname for previous month button. |
| class\_next  | CSS classname for next month button.     |
| class\_month | CSS classname for month and year.        |
| month\_name  | Name of the current month/               |
| month\_prev  | Name of the previous month.              |
| month\_next  | Name of the next month.                  |
| year         | Current year.                            |

## See Also

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)

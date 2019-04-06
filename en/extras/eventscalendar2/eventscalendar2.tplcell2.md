---
title: "tplCell2"
_old_id: "837"
_old_uri: "revo/eventscalendar2/eventscalendar2.tplcell2"
---

## Usage

This chunk is a cell of calendar table.

``` php 
<td id="[[+ec.cell_id]]" data-fulldate="[[+ec.fulldate]]"><td class="cell [[+ec.class]]" id="[[+ec.cell_id]]" data-fulldate="[[+ec.fulldate]]">
        <div class="[[+ec.class_date]]">[[+ec.day]]</div>
        <div class="[[+ec.class_event]]">[[+ec.events]]</div>
</td>
```

## Placeholders

| Name            | Description                                 |
| --------------- | ------------------------------------------- |
| class\_dow      | CSS classname for day of week.              |
| class\_month    | CSS classname for month and year.           |
| class\_workday  | CSS classname for workday.                  |
| class\_weekend  | CSS classname for weekend.                  |
| class\_today    | CSS classname for today.                    |
| class\_event    | CSS classname for div container with event. |
| class\_isevent  | CSS classname for cell with event.          |
| class\_noevent  | CSS classname for cell with no event.       |
| class\_date     | CSS classname for date of event.            |
| class\_emptyday | CSS classname for empty day, with no date.  |
| class\_prev     | CSS classname for previous month button.    |
| class\_next     | CSS classname for next month button.        |
| day\_total      | Total events in the day.                    |

## See Also

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2.eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)
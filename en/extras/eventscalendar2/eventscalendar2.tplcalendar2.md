---
title: "tplCalendar2"
_old_id: "836"
_old_uri: "revo/eventscalendar2/eventscalendar2.tplcalendar2"
---

## Usage

This chunk is a container for calendar.

``` php 
<div id='[[+calendar_id]]'>
        [[+ec.Calendar]]
        <div class='cover'></div>
</div>
```

## Placeholders

| Name            | Description                          |
| --------------- | ------------------------------------ |
| Calendar        | Generated calendar with events.      |
| calendar\_id    | Unique id of calendar table on page. |
| class\_calendar | CSS classname for calendar table.    |

## See Also

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2.eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)
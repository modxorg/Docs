---
title: "tplEvent2"
_old_id: "838"
_old_uri: "revo/eventscalendar2/eventscalendar2.tplevent2"
---

## Usage

This chunk is a template for one event in the day.

``` html
<div>
        <span class="num"><b>[[+ec.num]].</b></span>
        <span class="eventdate">[[+ec.date]]</span>
        <span class="link"><a href="[[+ec.url]]">[[+ec.longtitle:default=`[[+ec.pagetitle]]`]]</a></span>
        <span class="notice">[[+ec.introtext]]</span>
</div>
```

## Placeholders

| Name | Description                     |
| ---- | ------------------------------- |
| num  | Number of event in day.         |
| url  | Link to resource of this event. |
| date | Date of event.                  |

You can use all placeholders from MODX resources. See it [there](http://rtfm.modx.com/display/revolution20/Resources).

If you displaying events from custom source (param &events=``) all properties in events array will be converted to placeholders.

## See Also

1. [eventsCalendar2.eventsCalendar2](extras/eventscalendar2/eventscalendar2.eventscalendar2)
2. [eventsCalendar2.Generating events](extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](extras/eventscalendar2/eventscalendar2.tplhead2)

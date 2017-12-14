---
title: "eventsCalendar2.tplCell2"
_old_id: "837"
_old_uri: "revo/eventscalendar2/eventscalendar2.tplcell2"
---

<div>- [Usage](#eventsCalendar2.tplCell2-Usage)
- [Placeholders](#eventsCalendar2.tplCell2-Placeholders)
- [See Also](#eventsCalendar2.tplCell2-SeeAlso)

</div>Usage
-----

This chunk is a cell of calendar table.

```
<pre class="brush: php">
<td id="[[+ec.cell_id]]" data-fulldate="[[+ec.fulldate]]"><td class="cell [[+ec.class]]" id="[[+ec.cell_id]]" data-fulldate="[[+ec.fulldate]]">
        <div class="[[+ec.class_date]]">[[+ec.day]]</div>
        <div class="[[+ec.class_event]]">[[+ec.events]]</div>
</td>

```Placeholders
------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>class\_dow</td><td>CSS classname for day of week.</td></tr><tr><td>class\_month</td><td>CSS classname for month and year.</td></tr><tr><td>class\_workday</td><td>CSS classname for workday.</td></tr><tr><td>class\_weekend</td><td>CSS classname for weekend.</td></tr><tr><td>class\_today</td><td>CSS classname for today.</td></tr><tr><td>class\_event</td><td>CSS classname for div container with event.</td></tr><tr><td>class\_isevent</td><td>CSS classname for cell with event.</td></tr><tr><td>class\_noevent</td><td>CSS classname for cell with no event.</td></tr><tr><td>class\_date</td><td>CSS classname for date of event.</td></tr><tr><td>class\_emptyday</td><td>CSS classname for empty day, with no date.</td></tr><tr><td>class\_prev</td><td>CSS classname for previous month button.</td></tr><tr><td>class\_next</td><td>CSS classname for next month button.</td></tr><tr><td>day\_total</td><td>Total events in the day.</td></tr></tbody></table>See Also
--------

1. [eventsCalendar2.eventsCalendar2](/extras/revo/eventscalendar2/eventscalendar2.eventscalendar2)
2. [eventsCalendar2.Generating events](/extras/revo/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](/extras/revo/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](/extras/revo/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](/extras/revo/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](/extras/revo/eventscalendar2/eventscalendar2.tplhead2)
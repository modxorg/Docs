---
title: "eventsCalendar2.tplHead2"
_old_id: "839"
_old_uri: "revo/eventscalendar2/eventscalendar2.tplhead2"
---

<div>- [Usage](#eventsCalendar2.tplHead2-Usage)
- [Placeholders](#eventsCalendar2.tplHead2-Placeholders)
- [See Also](#eventsCalendar2.tplHead2-SeeAlso%26nbsp%3B)

</div>Usage
-----

This chunk is a header of the calendar.

```
<pre class="brush: php">
<tr><tr>
        <td class="[[+ec.class_prev]]"><a href="[[+ec.link_prev]]">&larr;</a></td>
        <td class="[[+ec.class_month]]" colspan="5" style="text-align:center;"><strong>[[+ec.month_name]] [[+ec.year]]</strong></td>
        <td class="[[+ec.class_next]]"><a href="[[+ec.link_next]]">&rarr;</a></td>
</tr>

```Placeholders
------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>link\_prev</td><td>Link to next month</td></tr><tr><td>link\_next</td><td>Link to previous month</td></tr><tr><td>class\_prev</td><td>CSS classname for previous month button.</td></tr><tr><td>class\_next</td><td>CSS classname for next month button.</td></tr><tr><td>class\_month</td><td>CSS classname for month and year.</td></tr><tr><td>month\_name</td><td>Name of the current month/</td></tr><tr><td>month\_prev</td><td>Name of the previous month.</td></tr><tr><td>month\_next</td><td>Name of the next month.</td></tr><tr><td>year</td><td>Current year.</td></tr></tbody></table>See Also 
---------

1. [eventsCalendar2.eventsCalendar2](/extras/revo/eventscalendar2/eventscalendar2.eventscalendar2)
2. [eventsCalendar2.Generating events](/extras/revo/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](/extras/revo/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](/extras/revo/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](/extras/revo/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](/extras/revo/eventscalendar2/eventscalendar2.tplhead2)
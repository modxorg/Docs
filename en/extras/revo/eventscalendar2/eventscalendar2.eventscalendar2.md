---
title: "eventsCalendar2.eventsCalendar2"
_old_id: "834"
_old_uri: "revo/eventscalendar2/eventscalendar2.eventscalendar2"
---

<div>- [Usage](#eventsCalendar2.eventsCalendar2-Usage)
- [Available Properties](#eventsCalendar2.eventsCalendar2-AvailableProperties)
- [Source code](#eventsCalendar2.eventsCalendar2-Sourcecode)
- [See Also](#eventsCalendar2.eventsCalendar2-SeeAlso)

</div>Usage
-----

Simply displays a calendar with events that are childrens of the current resource.

```
<pre class="brush: php">
[[!eventsCalendar2]]

```Display events from resources 5 and 11. Search for date in TV "date\_of\_event".

```
<pre class="brush: php">
[[!eventsCalendar2
  &parents=`4,11`
  &dateSource=`date_of_event`
]]

```Display [custom events](/extras/revo/eventscalendar2/eventscalendar2.generating-events "eventsCalendar2.Generating events"), independent from resources.

```
<pre class="brush: php">
[[!eventsCalendar2
  &events=`[{"id": "1","date": "2012-01-01 00:00:00","pagetitle": "Test page"},{"id": "2","date": "2012-01-02 12:05:00","pagetitle": "Test page 2"}]`
]]

```<div class="warning">Snippet always must be called uncached.</div>Available Properties
--------------------

<table id="TBL1376497247009"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>parents</td><td>The ids of an comm-separated list of existing containers.   
</td><td>?urrent resource   
</td></tr><tr><td>events</td><td>An json-array of events. Overrides all settings. Allows you to display random events from any source. Required date parameter in an array of events to date in the format "Ymd H:i:s".</td><td>none</td></tr><tr><td>month</td><td>A month to display events.   
</td><td>date('m')</td></tr><tr><td>year</td><td>A year to display events.</td><td>date('Y')</td></tr><tr><td>dateSource</td><td>Field for search the events date. It can be a TV.</td><td>createdon</td></tr><tr><td>dateFormat</td><td>Date format. Used [strftime()](http://docs.php.net/manual/en/function.strftime.php).</td><td>%d %b %Y %H:%M</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td>hideContainers</td><td>Hide containers?   
</td><td>0</td></tr><tr><td>showHidden</td><td>Show hidden in menu resources?</td><td>1</td></tr><tr><td>includeContent</td><td>Include content field? Disabling may increase perfomance.</td><td>1</td></tr><tr><td>includeTVs</td><td>Include template variables?</td><td>0</td></tr><tr><td>includeTVList   
</td><td>List of comma-separated template variables for including.   
</td><td>none</td></tr><tr><td>processTVs   
</td><td>Process template variables according to its type?   
</td><td>0</td></tr><tr><td>processTVList   
</td><td>List of comma-separated template variables for processing of events.   
</td><td>none</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td>tplMain</td><td>Name of existing chunk for templating calendar container.   
</td><td>tplCalendar2</td></tr><tr><td>tplEvent   
</td><td>Name of existing chunk for template events.   
</td><td>tplEvent2   
</td></tr><tr><td>tplHead</td><td>Name of existing chunk for template events.   
</td><td>tplHead2</td></tr><tr><td>tplCell</td><td>Name of existing chunk for template events.   
</td><td>tplCell2</td></tr><tr><td>theme</td><td>CSS theme for calendar. File must be in /core/assets/components/eventscalendar2/css/**%themename%**/theme.css.   
_For example theme bootstrap, included in package is in /core/assets/components/eventscalendar2/css/_**_bootstrap_**_/theme.css_  
</td><td>default</td></tr><tr><td>regCss</td><td>Load built-in CSS (or theme) for calendar?</td><td>1</td></tr><tr><td>regJs</td><td>Load built-in javascript for calendar?</td><td>1</td></tr><tr><td>plPrefix</td><td>Placeholders prefix.</td><td>ec.</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td>calendar\_id</td><td>Unique id of calendar table on page.</td><td>Calendar</td></tr><tr><td>class\_calendar</td><td>CSS classname for calendar table.   
</td><td>calendar</td></tr><tr><td>class\_dow</td><td>CSS classname for day of week.   
</td><td>dow</td></tr><tr><td>class\_month</td><td>CSS classname for month and year.   
</td><td>month</td></tr><tr><td>class\_workday   
</td><td>CSS classname for workday.   
</td><td>workday</td></tr><tr><td>class\_weekend   
</td><td>CSS classname for weekend.   
</td><td>weekend</td></tr><tr><td>class\_today   
</td><td>CSS classname for today.   
</td><td>today</td></tr><tr><td>class\_event   
</td><td>CSS classname for div container with event.   
</td><td>event</td></tr><tr><td>class\_isevent   
</td><td>CSS classname for cell with event.   
</td><td>isevent</td></tr><tr><td>class\_noevent   
</td><td>CSS classname for cell with no event.   
</td><td>noevent</td></tr><tr><td>class\_date   
</td><td>CSS classname for date of event.   
</td><td>date</td></tr><tr><td>class\_emptyday   
</td><td>CSS classname for empty day, with no date.   
</td><td>emptyday</td></tr><tr><td>class\_prev   
</td><td>CSS classname for previous month button.</td><td>prev</td></tr><tr><td>class\_next   
</td><td>CSS classname for next month button.   
</td><td>next</td></tr><tr><td>btn\_prev   
</td><td>Text for the button of previuos month.   
</td><td>«</td></tr><tr><td>btn\_next   
</td><td>Text for the button of next month.   
</td><td>»</td></tr><tr><td> </td><td> </td><td> </td></tr><tr><td>show\_errors   
</td><td>Show calendar errors on the webpage.   
</td><td>1</td></tr><tr><td>first\_day   
</td><td>0 - first day of week is a sunday. 1 - first day of week is a monday.   
</td><td>1</td></tr><tr><td>time\_shift   
</td><td>Time shift from the server in seconds. Maybe positive or negative.   
</td><td>0</td></tr></tbody></table>Source code
-----------

Here is this [snippet on Github](https://github.com/bezumkin/eventsCalendar2/blob/master/core/components/eventscalendar2/elements/snippets/snippet.eventscalendar2.php).

See Also
--------

1. [eventsCalendar2.eventsCalendar2](/extras/revo/eventscalendar2/eventscalendar2.eventscalendar2)
2. [eventsCalendar2.Generating events](/extras/revo/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](/extras/revo/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](/extras/revo/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](/extras/revo/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](/extras/revo/eventscalendar2/eventscalendar2.tplhead2)
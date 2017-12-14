---
title: "ChurchEventsList Snippet"
_old_id: "616"
_old_uri: "revo/church-events-calendar/churcheventslist-snippet"
---

Available Properties
--------------------

Version 1.0

### The list view Chunks

<table id="TBL1376497247004"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>ChurchEvents\_listEventTpl</td><td>The event details for the list, ListDayHolderTpl</td><td> </td></tr><tr><td>ChurchEvents\_listDayHolderTpl</td><td>The holder for a list of events.</td><td> </td></tr></tbody></table>### Others

<table id="TBL1376497247005"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>skin</td><td>The concept is that you can copy and rename all tpls with the prefix ChurchEvents and give them your own prefix like MyCustomSkin. Now rather then declare each property change in the snippet call you can just declare the Skin you want to use. If you assign a value to a tpl property it will override the skin name for that one property.</td><td>ChurchEvents</td></tr><tr><td>prominent</td><td>List prominent events, if set can be Yes/No</td><td>NULL</td></tr><tr><td>limit</td><td>limit the number of events listed, must be numeric</td><td>15</td></tr><tr><td>calendarID</td><td>Show one calendar, default shows all</td><td> </td></tr><tr><td>categoryID</td><td>Show one category, default shows all</td><td> </td></tr><tr><td>year</td><td>Choose a year to start from, default is current year(YYYY)</td><td> </td></tr><tr><td>month</td><td>Choose a month to start from, default is current month(MM)</td><td> </td></tr><tr><td>day</td><td>Choose a day to start from, default is current day (DD)</td><td> </td></tr></tbody></table>Examples
--------

Basic this will show the next 15 events in a list

```
<pre class="brush: php">
<ul>
[[!ChurchEventsList]]
</ul>

```Show a list of events that are marked as prominent with a limit of 10

```
<pre class="brush: php">
[[!ChurchEventsList?
  &prominent=`Yes`
  &limit=`10`
]]

```
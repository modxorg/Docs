---
title: "mxCalendar.Examples"
_old_id: "941"
_old_uri: "revo/mxcalendar/mxcalendar.examples"
---

Revolution
----------

### Listing Events

#### Generic List of Upcoming Events

Display a generic list of events from all calendars and all categories with clickable modal window view.

- Resource ID 49 used for example only (replace with your ajaxResource's ID).
- Omit "&modalView and &ajaxResourceId" parameters for a standard detail view.
- Add duplicated chunks and additional parameters for customized output (more variations and examples coming soon).

```
<pre class="brush: php">
[[!mxcalendar?
&eventListlimit=`8`
&displayType=`list`
&ajaxResourceId=`49`
&modalView=`1`
&dir=`ASC`]]

```- Add parameters to display further ahead (default is +4 weeks)
- Omit or alter "&eventListLimit" for more list items (default is 5 list items)

```
<pre class="brush: php">
&elStartDate=`now`
&elEndDate=`+16 weeks`

```#### Generic List of Past Events

mxCalendar can also display past events. The three parameters you want to look at are:

**&elDirectinal=`past`** - This tells mxCalendar to pull back all calendar events that happened in past thus less than the date supplied in the elStartDate field   
**&elStartDate=`now`** - Same as with regular events sets a starting point to filter date range for results   
**&dir=`DESC`** - Returns events in the order from most recent to oldest

Example:

(duplicate the tplListItem and tplListWrap chunks, rename, save, and insert into the mxCalendar snippet call as shown below)

```
<pre class="brush: php">
[[!mxcalendar?
&displayType=`list`
&elDirectional=`past`
&isLocked=`1`
&resourceId=`71`
&tplListHeading=``
&tplListItem=`tplListItemNewChunk`
&calendarFilter=`2`
&elStartDate=`now`
&tplListWrap=`tplListWrapNewChunk`
&dir=`DESC`]]

```
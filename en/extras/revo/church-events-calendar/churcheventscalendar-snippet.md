---
title: "ChurchEventsCalendar Snippet"
_old_id: "615"
_old_uri: "revo/church-events-calendar/churcheventscalendar-snippet"
---

<div>- [Customizing your calendar](#ChurchEventsCalendarSnippet-Customizingyourcalendar)
- [Available Properties](#ChurchEventsCalendarSnippet-AvailableProperties)
  - [The calendar grid (day/week/month/year) views share the following Chunks](#ChurchEventsCalendarSnippet-Thecalendargrid%28day%2Fweek%2Fmonth%2Fyear%29viewsshare%26nbsp%3BthefollowingChunks)
  - [The calendar day view chunks](#ChurchEventsCalendarSnippet-Thecalendardayviewchunks)
  - [The calendar week view chunks](#ChurchEventsCalendarSnippet-Thecalendarweekviewchunks)
  - [The calendar month view Chunks](#ChurchEventsCalendarSnippet-ThecalendarmonthviewChunks)
  - [The calendar year view Chunks](#ChurchEventsCalendarSnippet-ThecalendaryearviewChunks)
  - [The calendar location view chunks](#ChurchEventsCalendarSnippet-Thecalendarlocationviewchunks)
  - [The event description view Chunks](#ChurchEventsCalendarSnippet-TheeventdescriptionviewChunks)
  - [The event add/edit view Chunks](#ChurchEventsCalendarSnippet-Theeventadd%2FeditviewChunks)
  - [The delete event view Chunks](#ChurchEventsCalendarSnippet-ThedeleteeventviewChunks)
  - [Skins](#ChurchEventsCalendarSnippet-Skins)
  - [Generated Email Chunks](#ChurchEventsCalendarSnippet-GeneratedEmailChunks)
- [Examples](#ChurchEventsCalendarSnippet-Examples)

</div>Customizing your calendar
-------------------------

Church Events Calendar uses Chunks for all output from the Snippets. You should see all chunks in Elements -> Chunks -> ChurchEvents

<div class="note">It is recommended to Duplicate the Chunk that you wish to change and rename it. Then you will not lose your changes when a new update is out. For organization it would be also recommend that you create a new folder to put you custom Chunks into.</div>Since Church Events has a custom caching component after you make changes to your Chunk you will need have this param: clearCache in the URI of the view that you have changed. For example if you made a new Chunk for the Day view for the dayEventTpl, then you would need to put on the end of the URL a ?clearCache=Y or &clearCache=Y.

Available Properties
--------------------

Version 1.0

### The calendar grid (day/week/month/year) views share the following Chunks

<table id="TBL1376497246998"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>headTpl</td><td>This is the JS/CSS for the calendar goes in the <head> and can use the results from looping categoryHeadTpl like ```
<pre class="brush: php">
 [[+categoryHeadTpl]] 

```</td><td>ChurchEvents\_HeadTpl</td></tr><tr><td>categoryHeadTpl</td><td>Category CSS or JS that will go through loop and be placed in <head></td><td>ChurchEvents\_CategoryHeadTpl</td></tr><tr><td>calFilterTpl</td><td>Calendar Filter</td><td>ChurchEvents\_CalFilterTpl</td></tr><tr><td>calAdminFilterTpl   
</td><td>Calendar Filter (added in 1.1)   
</td><td>ChurchEvents\_CalFilterTpl   
</td></tr><tr><td>calNavTpl</td><td>Calendar navigation, next and previous months</td><td>ChurchEvents\_CalNavTpl</td></tr><tr><td>calendarID</td><td>The default calender that is displayed (added in 1.1)   
</td><td>0   
</td></tr><tr><td>categoryID</td><td>The default category that is displayed (added in 1.1)   
</td><td>0   
</td></tr></tbody></table>### The calendar day view chunks

The day view shows all events in a selected day that meet the selected filters.

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>dayEventTpl</td><td>Calendar Event   
</td><td>ChurchEvents\_DayEventTpl</td></tr><tr><td>dayHolderTpl</td><td>Calendar day holder - default shares Tpl with month view</td><td>ChurchEvents\_DayHolderTpl</td></tr></tbody></table>### The calendar week view chunks

The week view shows days Sunday to Monday and all events that meet the selected filters.

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>weekTableTpl</td><td>Calendar table - default shares Tpl with month view   
</td><td>ChurchEvents\_CalTableTpl</td></tr><tr><td>weekRowTpl</td><td>Calendar row - default shares Tpl with month view</td><td>ChurchEvents\_CalRowTpl</td></tr><tr><td>weekEventTpl</td><td>Calendar Event - default shares Tpl with month view</td><td>ChurchEvents\_CalEventTpl</td></tr><tr><td>weekDayHolderTpl</td><td>Calendar day holder - default shares Tpl with month view</td><td>ChurchEvents\_CalDayHolderTpl</td></tr><tr><td>weekColumnHeadTpl</td><td>Calendar column header - default shares Tpl with month view</td><td>ChurchEvents\_CalColumnHeadTpl</td></tr><tr><td>weekColumnTpl</td><td>Calendar column - default shares Tpl with month view</td><td>ChurchEvents\_CalColumnTpl</td></tr></tbody></table>### The calendar month view Chunks

The month view shows a complete month in a grid(table) format and all events that meet the selected filters.

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>calTableTpl</td><td>Calendar table</td><td>ChurchEvents\_CalTableTpl</td></tr><tr><td>calRowTpl</td><td>Calendar row</td><td>ChurchEvents\_CalRowTpl</td></tr><tr><td>calEventTpl</td><td>Calendar Event</td><td>ChurchEvents\_CalEventTpl</td></tr><tr><td>calDayHolderTpl</td><td>Calendar day holder</td><td>ChurchEvents\_CalDayHolderTpl</td></tr><tr><td>calColumnHeadTpl</td><td>Calendar column header</td><td>ChurchEvents\_CalColumnHeadTpl</td></tr><tr><td>calColumnTpl</td><td>Calendar column</td><td>ChurchEvents\_CalColumnTpl</td></tr></tbody></table>### The calendar year view Chunks

The year view shows the 12 months each as a grid(table) and then give a sum of the events for each day that meet the selected filters.

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>yearTableTpl</td><td>Calendar table   
</td><td>ChurchEvents\_YearTableTpl</td></tr><tr><td>yearRowTpl</td><td>Calendar row - default shares Tpl with month view</td><td>ChurchEvents\_CalRowTpl</td></tr><tr><td>yearColumnHeadTpl</td><td>Calendar column header - default shares Tpl with month view</td><td>ChurchEvents\_CalColumnHeadTpl</td></tr><tr><td>yearColumnTpl</td><td>Calendar column   
</td><td>ChurchEvents\_YearColumnTpl</td></tr></tbody></table>### The calendar location view chunks

This view is only see if you have the useLocations System Setting set to Yes. It will show all info of a single location.

<table><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>locationDescriptionTpl</td><td>Shows all info for a single location   
</td><td>ChurchEvents\_LocationDescriptionTpl</td></tr></tbody></table>### The event description view Chunks

<table id="TBL1376497246999"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>eventDescriptionTpl</td><td>Shows event description information of a single event (event description page).</td><td>ChurchEvents\_EventDescriptionTpl</td></tr><tr><td>eventDescriptionBasicLocationTpl</td><td>Basic location information on the event description page. Only used if the Use Locations System Setting is No.</td><td>ChurchEvents\_EventDescriptionBasicLocationTpl</td></tr><tr><td>eventDescriptionLocationTypeTpl</td><td>Loops through each location type(building) and shows all locations(rooms) in it on the event description page. Only used if the Use Locations System Setting is Yes.</td><td>ChurchEvents\_EventDescriptionLocationTypeTpl</td></tr><tr><td>eventDescriptionLocationTpl</td><td>Loops through each location(room) and shows information on the event description page. Only used if the Use Locations System Setting is Yes.</td><td>ChurchEvents\_EventDescriptionLocationTpl</td></tr></tbody></table>### The event add/edit view Chunks

<table id="TBL1376497247000"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>eventFormHeadTpl</td><td>The <head> JS/CSS for the add/edit/request event form.</td><td>ChurchEvents\_EventFormHeadTpl</td></tr><tr><td>eventFormTpl</td><td>The add/edit event form, uses FormIt</td><td>ChurchEvents\_EventFormTpl</td></tr><tr><td>eventFormConflictTpl</td><td>Shows error message list of events that are conflicting, only used if the Use Locations System Setting is Yes.</td><td>ChurchEvents\_EventFormConflictTpl</td></tr><tr><td>eventFormAdminTpl</td><td>Event form admin section, only shows if user has permission to be admin</td><td>ChurchEvents\_EventFormAdminTpl</td></tr><tr><td>eventFormRepeatTpl</td><td>Option for repeating events on the edit form, all or single instance</td><td>ChurchEvents\_EventFormRepeatTpl</td></tr><tr><td>eventFormBasicLocationTpl</td><td>Basic location information, only used if the Use Locations System Setting is No.</td><td>ChurchEvents\_EventFormBasicLocationTpl</td></tr><tr><td>eventFormLocationTypeTpl</td><td>Loops through each location type(building) and shows all locations(rooms) in it on the event form page. Only used if the Use Locations System Setting is Yes.</td><td>ChurchEvents\_EventFormLocationTypeTpl</td></tr><tr><td>eventFormLocationTpl</td><td>Loops through each location(room) and shows information on the event form page. Only used if the Use Locations System Setting is Yes.</td><td>ChurchEvents\_EventFormLocationTpl</td></tr></tbody></table>### The delete event view Chunks

<table id="TBL1376497247001"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>deleteFormHeadTpl</td><td>Any JS/CSS for the delete form</td><td>ChurchEvents\_DeleteFormHeadTpl</td></tr><tr><td>deleteFormTpl</td><td>The delete event form, uses FormIt</td><td>ChurchEvents\_DeleteFormTpl</td></tr><tr><td>deleteFormRepeatTpl</td><td>Option for repeating events on the delete form, all or single instance</td><td>ChurchEvents\_DeleteFormRepeatTpl</td></tr></tbody></table>### Skins

<table id="TBL1376497247002"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>skin</td><td>The concept is that you can copy and rename all tpls with the prefix ChurchEvents and give them your own prefix like MyCustomSkin. Now rather then declare each property change in the snippet call you can just declare the Skin you want to use. If you assign a value to a tpl property it will override the skin name for that one property.</td><td>ChurchEvents</td></tr></tbody></table>### Generated Email Chunks

An email is generated for requested events

<table id="TBL1376497247003"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>emailRequestNoticeTpl</td><td>The is the email that will be send if a user requests an event.</td><td>emailRequestNoticeTpl</td></tr><tr><td>emailBasicLocationTpl</td><td>Basic location information, only used if the Use Locations System Setting is No.</td><td>emailBasicLocationTpl</td></tr><tr><td>emailLocationTypeTpl</td><td>Loops through each location type(building) and shows all locations(rooms) in it on the event request email. Only used if the Use Locations System Setting is Yes.</td><td>emailLocationTypeTpl</td></tr><tr><td>emailLocationTpl</td><td>Loops through each location(room) and shows information on the event request email. Only used if the Use Locations System Setting is Yes.</td><td>emailLocationTpl</td></tr></tbody></table>Examples
--------

Basic this will show a complete calendar grid

```
<pre class="brush: php">
[[!ChurchEventsCalendar]]

```Show a complete calendar grid with your own custom tpl for the calEventTpl

```
<pre class="brush: php">
[[!ChurchEventsCalendar?
  &calEventTpl=`MyCustomCalEventTpl`
]]

```
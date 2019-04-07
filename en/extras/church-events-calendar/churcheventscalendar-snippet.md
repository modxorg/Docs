---
title: "ChurchEventsCalendar Snippet"
_old_id: "615"
_old_uri: "revo/church-events-calendar/churcheventscalendar-snippet"
---

## Customizing your calendar

Church Events Calendar uses Chunks for all output from the Snippets. You should see all chunks in Elements -> Chunks -> ChurchEvents

It is recommended to Duplicate the Chunk that you wish to change and rename it. Then you will not lose your changes when a new update is out. For organization it would be also recommend that you create a new folder to put you custom Chunks into.

Since Church Events has a custom caching component after you make changes to your Chunk you will need have this param: clearCache in the URI of the view that you have changed. For example if you made a new Chunk for the Day view for the dayEventTpl, then you would need to put on the end of the URL a ?clearCache=Y or &clearCache=Y.

## Available Properties

Version 1.0

### The calendar grid (day/week/month/year) views share the following Chunks

| Name              | Description                                                                                                                                     | Default Value                 |
| ----------------- | ----------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------- |
| headTpl           | This is the JS/CSS for the calendar goes in the <head> and can use the results from looping categoryHeadTpl like ``` php[[+categoryHeadTpl]]``` | ChurchEvents\_HeadTpl         |
| categoryHeadTpl   | Category CSS or JS that will go through loop and be placed in <head>                                                                            | ChurchEvents\_CategoryHeadTpl |
| calFilterTpl      | Calendar Filter                                                                                                                                 | ChurchEvents\_CalFilterTpl    |
| calAdminFilterTpl | Calendar Filter (added in 1.1)                                                                                                                  | ChurchEvents\_CalFilterTpl    |
| calNavTpl         | Calendar navigation, next and previous months                                                                                                   | ChurchEvents\_CalNavTpl       |
| calendarID        | The default calender that is displayed (added in 1.1)                                                                                           | 0                             |
| categoryID        | The default category that is displayed (added in 1.1)                                                                                           | 0                             |

### The calendar day view chunks

The day view shows all events in a selected day that meet the selected filters.

| Name         | Description                                              | Default Value              |
| ------------ | -------------------------------------------------------- | -------------------------- |
| dayEventTpl  | Calendar Event                                           | ChurchEvents\_DayEventTpl  |
| dayHolderTpl | Calendar day holder - default shares Tpl with month view | ChurchEvents\_DayHolderTpl |

### The calendar week view chunks

The week view shows days Sunday to Monday and all events that meet the selected filters.

| Name              | Description                                                 | Default Value                  |
| ----------------- | ----------------------------------------------------------- | ------------------------------ |
| weekTableTpl      | Calendar table - default shares Tpl with month view         | ChurchEvents\_CalTableTpl      |
| weekRowTpl        | Calendar row - default shares Tpl with month view           | ChurchEvents\_CalRowTpl        |
| weekEventTpl      | Calendar Event - default shares Tpl with month view         | ChurchEvents\_CalEventTpl      |
| weekDayHolderTpl  | Calendar day holder - default shares Tpl with month view    | ChurchEvents\_CalDayHolderTpl  |
| weekColumnHeadTpl | Calendar column header - default shares Tpl with month view | ChurchEvents\_CalColumnHeadTpl |
| weekColumnTpl     | Calendar column - default shares Tpl with month view        | ChurchEvents\_CalColumnTpl     |

### The calendar month view Chunks

The month view shows a complete month in a grid(table) format and all events that meet the selected filters.

| Name             | Description            | Default Value                  |
| ---------------- | ---------------------- | ------------------------------ |
| calTableTpl      | Calendar table         | ChurchEvents\_CalTableTpl      |
| calRowTpl        | Calendar row           | ChurchEvents\_CalRowTpl        |
| calEventTpl      | Calendar Event         | ChurchEvents\_CalEventTpl      |
| calDayHolderTpl  | Calendar day holder    | ChurchEvents\_CalDayHolderTpl  |
| calColumnHeadTpl | Calendar column header | ChurchEvents\_CalColumnHeadTpl |
| calColumnTpl     | Calendar column        | ChurchEvents\_CalColumnTpl     |

### The calendar year view Chunks

The year view shows the 12 months each as a grid(table) and then give a sum of the events for each day that meet the selected filters.

| Name              | Description                                                 | Default Value                  |
| ----------------- | ----------------------------------------------------------- | ------------------------------ |
| yearTableTpl      | Calendar table                                              | ChurchEvents\_YearTableTpl     |
| yearRowTpl        | Calendar row - default shares Tpl with month view           | ChurchEvents\_CalRowTpl        |
| yearColumnHeadTpl | Calendar column header - default shares Tpl with month view | ChurchEvents\_CalColumnHeadTpl |
| yearColumnTpl     | Calendar column                                             | ChurchEvents\_YearColumnTpl    |

### The calendar location view chunks

This view is only see if you have the useLocations System Setting set to Yes. It will show all info of a single location.

| Name                   | Description                          | Default Value                        |
| ---------------------- | ------------------------------------ | ------------------------------------ |
| locationDescriptionTpl | Shows all info for a single location | ChurchEvents\_LocationDescriptionTpl |

### The event description view Chunks

| Name                             | Description                                                                                                                                                          | Default Value                                  |
| -------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------- |
| eventDescriptionTpl              | Shows event description information of a single event (event description page).                                                                                      | ChurchEvents\_EventDescriptionTpl              |
| eventDescriptionBasicLocationTpl | Basic location information on the event description page. Only used if the Use Locations System Setting is No.                                                       | ChurchEvents\_EventDescriptionBasicLocationTpl |
| eventDescriptionLocationTypeTpl  | Loops through each location type(building) and shows all locations(rooms) in it on the event description page. Only used if the Use Locations System Setting is Yes. | ChurchEvents\_EventDescriptionLocationTypeTpl  |
| eventDescriptionLocationTpl      | Loops through each location(room) and shows information on the event description page. Only used if the Use Locations System Setting is Yes.                         | ChurchEvents\_EventDescriptionLocationTpl      |

### The event add/edit view Chunks

| Name                      | Description                                                                                                                                                   | Default Value                           |
| ------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------- |
| eventFormHeadTpl          | The <head> JS/CSS for the add/edit/request event form.                                                                                                        | ChurchEvents\_EventFormHeadTpl          |
| eventFormTpl              | The add/edit event form, uses FormIt                                                                                                                          | ChurchEvents\_EventFormTpl              |
| eventFormConflictTpl      | Shows error message list of events that are conflicting, only used if the Use Locations System Setting is Yes.                                                | ChurchEvents\_EventFormConflictTpl      |
| eventFormAdminTpl         | Event form admin section, only shows if user has permission to be admin                                                                                       | ChurchEvents\_EventFormAdminTpl         |
| eventFormRepeatTpl        | Option for repeating events on the edit form, all or single instance                                                                                          | ChurchEvents\_EventFormRepeatTpl        |
| eventFormBasicLocationTpl | Basic location information, only used if the Use Locations System Setting is No.                                                                              | ChurchEvents\_EventFormBasicLocationTpl |
| eventFormLocationTypeTpl  | Loops through each location type(building) and shows all locations(rooms) in it on the event form page. Only used if the Use Locations System Setting is Yes. | ChurchEvents\_EventFormLocationTypeTpl  |
| eventFormLocationTpl      | Loops through each location(room) and shows information on the event form page. Only used if the Use Locations System Setting is Yes.                         | ChurchEvents\_EventFormLocationTpl      |

### The delete event view Chunks

| Name                | Description                                                            | Default Value                     |
| ------------------- | ---------------------------------------------------------------------- | --------------------------------- |
| deleteFormHeadTpl   | Any JS/CSS for the delete form                                         | ChurchEvents\_DeleteFormHeadTpl   |
| deleteFormTpl       | The delete event form, uses FormIt                                     | ChurchEvents\_DeleteFormTpl       |
| deleteFormRepeatTpl | Option for repeating events on the delete form, all or single instance | ChurchEvents\_DeleteFormRepeatTpl |

### Skins

| Name | Description                                                                                                                                                                                                                                                                                                                                      | Default Value |
| ---- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------- |
| skin | The concept is that you can copy and rename all tpls with the prefix ChurchEvents and give them your own prefix like MyCustomSkin. Now rather then declare each property change in the snippet call you can just declare the Skin you want to use. If you assign a value to a tpl property it will override the skin name for that one property. | ChurchEvents  |

### Generated Email Chunks

An email is generated for requested events

| Name                  | Description                                                                                                                                                       | Default Value         |
| --------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------- |
| emailRequestNoticeTpl | The is the email that will be send if a user requests an event.                                                                                                   | emailRequestNoticeTpl |
| emailBasicLocationTpl | Basic location information, only used if the Use Locations System Setting is No.                                                                                  | emailBasicLocationTpl |
| emailLocationTypeTpl  | Loops through each location type(building) and shows all locations(rooms) in it on the event request email. Only used if the Use Locations System Setting is Yes. | emailLocationTypeTpl  |
| emailLocationTpl      | Loops through each location(room) and shows information on the event request email. Only used if the Use Locations System Setting is Yes.                         | emailLocationTpl      |

## Examples

Basic this will show a complete calendar grid

``` php
[[!ChurchEventsCalendar]]
```

Show a complete calendar grid with your own custom tpl for the calEventTpl

``` php
[[!ChurchEventsCalendar?
  &calEventTpl=`MyCustomCalEventTpl`
]]
```

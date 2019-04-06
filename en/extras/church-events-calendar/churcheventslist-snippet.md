---
title: "ChurchEventsList Snippet"
_old_id: "616"
_old_uri: "revo/church-events-calendar/churcheventslist-snippet"
---

## Available Properties

Version 1.0

### The list view Chunks

| Name                           | Description                                      | Default Value |
| ------------------------------ | ------------------------------------------------ | ------------- |
| ChurchEvents\_listEventTpl     | The event details for the list, ListDayHolderTpl |               |
| ChurchEvents\_listDayHolderTpl | The holder for a list of events.                 |               |

### Others

| Name       | Description                                                                                                                                                                                                                                                                                                                                      | Default Value |
| ---------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------- |
| skin       | The concept is that you can copy and rename all tpls with the prefix ChurchEvents and give them your own prefix like MyCustomSkin. Now rather then declare each property change in the snippet call you can just declare the Skin you want to use. If you assign a value to a tpl property it will override the skin name for that one property. | ChurchEvents  |
| prominent  | List prominent events, if set can be Yes/No                                                                                                                                                                                                                                                                                                      | NULL          |
| limit      | limit the number of events listed, must be numeric                                                                                                                                                                                                                                                                                               | 15            |
| calendarID | Show one calendar, default shows all                                                                                                                                                                                                                                                                                                             |               |
| categoryID | Show one category, default shows all                                                                                                                                                                                                                                                                                                             |               |
| year       | Choose a year to start from, default is current year(YYYY)                                                                                                                                                                                                                                                                                       |               |
| month      | Choose a month to start from, default is current month(MM)                                                                                                                                                                                                                                                                                       |               |
| day        | Choose a day to start from, default is current day (DD)                                                                                                                                                                                                                                                                                          |               |

## Examples

Basic this will show the next 15 events in a list

``` php
<ul>
[[!ChurchEventsList]]
</ul>
```

Show a list of events that are marked as prominent with a limit of 10

``` php
[[!ChurchEventsList?
  &prominent=`Yes`
  &limit=`10`
]]
```

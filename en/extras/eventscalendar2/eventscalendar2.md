---
title: "eventsCalendar2"
_old_id: "834"
_old_uri: "revo/eventscalendar2/eventscalendar2.eventscalendar2"
---

## Usage

Simply displays a calendar with events that are childrens of the current resource.

``` php 
[[!eventsCalendar2]]
```

Display events from resources 5 and 11. Search for date in TV "date\_of\_event".

``` php 
[[!eventsCalendar2
  &parents=`4,11`
  &dateSource=`date_of_event`
]]
```

Display [custom events](/extras/eventscalendar2/eventscalendar2.generating-events "eventsCalendar2.Generating events"), independent from resources.

``` php 
[[!eventsCalendar2
  &events=`[{"id": "1","date": "2012-01-01 00:00:00","pagetitle": "Test page"},{"id": "2","date": "2012-01-02 12:05:00","pagetitle": "Test page 2"}]`
]]
```

Snippet always must be called uncached.

## Available Properties

| Name                                                                                                                             | Description                                                                                                                                                                            | Default Value    |
| -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------- |
| parents                                                                                                                          | The ids of an comm-separated list of existing containers.                                                                                                                              | ?urrent resource |
| events                                                                                                                           | An json-array of events. Overrides all settings. Allows you to display random events from any source. Required date parameter in an array of events to date in the format "Ymd H:i:s". | none             |
| month                                                                                                                            | A month to display events.                                                                                                                                                             | date('m')        |
| year                                                                                                                             | A year to display events.                                                                                                                                                              | date('Y')        |
| dateSource                                                                                                                       | Field for search the events date. It can be a TV.                                                                                                                                      | createdon        |
| dateFormat                                                                                                                       | Date format. Used [strftime()](http://docs.php.net/manual/en/function.strftime.php).                                                                                                   | %d %b %Y %H:%M   |
|                                                                                                                                  |                                                                                                                                                                                        |                  |
| hideContainers                                                                                                                   | Hide containers?                                                                                                                                                                       | 0                |
| showHidden                                                                                                                       | Show hidden in menu resources?                                                                                                                                                         | 1                |
| includeContent                                                                                                                   | Include content field? Disabling may increase perfomance.                                                                                                                              | 1                |
| includeTVs                                                                                                                       | Include template variables?                                                                                                                                                            | 0                |
| includeTVList                                                                                                                    | List of comma-separated template variables for including.                                                                                                                              | none             |
| processTVs                                                                                                                       | Process template variables according to its type?                                                                                                                                      | 0                |
| processTVList                                                                                                                    | List of comma-separated template variables for processing of events.                                                                                                                   | none             |
|                                                                                                                                  |                                                                                                                                                                                        |                  |
| tplMain                                                                                                                          | Name of existing chunk for templating calendar container.                                                                                                                              | tplCalendar2     |
| tplEvent                                                                                                                         | Name of existing chunk for template events.                                                                                                                                            | tplEvent2        |
| tplHead                                                                                                                          | Name of existing chunk for template events.                                                                                                                                            | tplHead2         |
| tplCell                                                                                                                          | Name of existing chunk for template events.                                                                                                                                            | tplCell2         |
| theme                                                                                                                            | CSS theme for calendar. File must be in /core/assets/components/eventscalendar2/css/**%themename%**/theme.css.                                                                         |
| _For example theme bootstrap, included in package is in /core/assets/components/eventscalendar2/css/_**_bootstrap_**_/theme.css_ | default                                                                                                                                                                                |
| regCss                                                                                                                           | Load built-in CSS (or theme) for calendar?                                                                                                                                             | 1                |
| regJs                                                                                                                            | Load built-in javascript for calendar?                                                                                                                                                 | 1                |
| plPrefix                                                                                                                         | Placeholders prefix.                                                                                                                                                                   | ec.              |
|                                                                                                                                  |                                                                                                                                                                                        |                  |
| calendar\_id                                                                                                                     | Unique id of calendar table on page.                                                                                                                                                   | Calendar         |
| class\_calendar                                                                                                                  | CSS classname for calendar table.                                                                                                                                                      | calendar         |
| class\_dow                                                                                                                       | CSS classname for day of week.                                                                                                                                                         | dow              |
| class\_month                                                                                                                     | CSS classname for month and year.                                                                                                                                                      | month            |
| class\_workday                                                                                                                   | CSS classname for workday.                                                                                                                                                             | workday          |
| class\_weekend                                                                                                                   | CSS classname for weekend.                                                                                                                                                             | weekend          |
| class\_today                                                                                                                     | CSS classname for today.                                                                                                                                                               | today            |
| class\_event                                                                                                                     | CSS classname for div container with event.                                                                                                                                            | event            |
| class\_isevent                                                                                                                   | CSS classname for cell with event.                                                                                                                                                     | isevent          |
| class\_noevent                                                                                                                   | CSS classname for cell with no event.                                                                                                                                                  | noevent          |
| class\_date                                                                                                                      | CSS classname for date of event.                                                                                                                                                       | date             |
| class\_emptyday                                                                                                                  | CSS classname for empty day, with no date.                                                                                                                                             | emptyday         |
| class\_prev                                                                                                                      | CSS classname for previous month button.                                                                                                                                               | prev             |
| class\_next                                                                                                                      | CSS classname for next month button.                                                                                                                                                   | next             |
| btn\_prev                                                                                                                        | Text for the button of previuos month.                                                                                                                                                 | «                |
| btn\_next                                                                                                                        | Text for the button of next month.                                                                                                                                                     | »                |
|                                                                                                                                  |                                                                                                                                                                                        |                  |
| show\_errors                                                                                                                     | Show calendar errors on the webpage.                                                                                                                                                   | 1                |
| first\_day                                                                                                                       | 0 - first day of week is a sunday. 1 - first day of week is a monday.                                                                                                                  | 1                |
| time\_shift                                                                                                                      | Time shift from the server in seconds. Maybe positive or negative.                                                                                                                     | 0                |

## Source code

Here is this [snippet on Github](https://github.com/bezumkin/eventsCalendar2/blob/master/core/components/eventscalendar2/elements/snippets/snippet.eventscalendar2.php).

## See Also

1. [eventsCalendar2.eventsCalendar2](/extras/eventscalendar2/eventscalendar2.eventscalendar2)
2. [eventsCalendar2.Generating events](/extras/eventscalendar2/eventscalendar2.generating-events)
3. [eventsCalendar2.tplCalendar2](/extras/eventscalendar2/eventscalendar2.tplcalendar2)
4. [eventsCalendar2.tplCell2](/extras/eventscalendar2/eventscalendar2.tplcell2)
5. [eventsCalendar2.tplEvent2](/extras/eventscalendar2/eventscalendar2.tplevent2)
6. [eventsCalendar2.tplHead2](/extras/eventscalendar2/eventscalendar2.tplhead2)
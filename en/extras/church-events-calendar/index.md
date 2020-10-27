---
title: "Church Events Calendar"
_old_id: "614"
_old_uri: "revo/church-events-calendar"
---

## What is Church Events Calendar?

ChurchEvents is a calendar extra for MODX Revolution was initially designed specifically for churches but would be useful in many other contexts. Churchevents now supports templates and translations. There are now 3 Snippets included: ChurchEventsCalendar, ChurchEventsList and ChurchEventsRss.

## Required extra Packages

You must install the following packages before you can install ChurchEvents.

- FormIt
- ColorPicker

## History

ChurchEvents was written by Josh Gulledge to be a complete calendar for MODX, first release was in early 2011. In November 2011, ChurchEvents was rewretten to meet MODX coding standards.

### Demo

See a [live demo](http://www.joshua19media.com/modx-development/church-events.html).

### Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODX Extras Repository, here: <https://modx.com/extras/package/churchevents>

### Development and Bug Reporting

ChurchEvents is on GitHub: <https://github.com/jgulledge19/Church-Events-Calendar>, report any issues or feature requests here: <https://github.com/jgulledge19/Church-Events-Calendar/issues>.

## Install

1. Install via the package manager

### How to use

To make a calendar on you page:

``` php
[[!ChurchEventsCalendar?]]
```

Make a list of all prominent events with a limit of 10 on you page:

``` php
[[!ChurchEventsList?  &prominent=`Yes`  &limit=`10`]]
```

### [System Settings](building-sites/settings "System Settings")

These need to be created if they do not exist.

| Name                 | Key                        | Field Type | Namespace    | Area Lexicon | Default Value | Description                                                                                                                                                                                                 |
| -------------------- | -------------------------- | ---------- | ------------ | ------------ | ------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Allow Requests       | churchevents.allowRequests | Yes/No     | churchevents | ChurchEvents | Yes           | Allow guests to request events.                                                                                                                                                                             |
| Date Format          | churchevents.dateFormat    | Textfield  | churchevents | ChurchEvents | %m/%d/%Y      | This is the format that will appear on forms and when a date is presented. Default is %m/%d/%Y see php.net/strftime for all options.                                                                        |
| Extended Fields      | churchevents.extended      | Textarea   | churchevents | ChurchEvents |               | A comma separated list of fields you want on the event form. Example: extend\_numberOfPeople,extend\_needCatering.                                                                                          |
| Page/Resource ID     | churchevents.pageID        | Textfield  | churchevents | ChurchEvents |               | This is the Page/Resource ID where the calendar will be located. This is what all generated URLs are based on.                                                                                              |
| Use Locations        | churchevents.useLocations  | Yes/No     | churchevents | ChurchEvents | Yes           | Use the location manager. If yes events will choose from a list of locations and events can check for conflicts. If no then each event can have a typed in a location and no event is checked for conflict. |
| RSS Page/Resource ID | churchevents.rssPageID     | Textfield  | churchevents | ChurchEvents |               | This is the Page/Resource ID that will have the RSSEvents snippet and all generated RSS URLs will go here.                                                                                                  |

## See Also

1. [ChurchEvents.MODX Manager functions](extras/church-events-calendar/churchevents.modx-manager-functions)
2. [ChurchEventsCalendar Snippet](extras/church-events-calendar/churcheventscalendar-snippet)
    1. [ChurchEvents.Managing events](extras/church-events-calendar/churcheventscalendar-snippet/churchevents.managing-events)
3. [ChurchEventsList Snippet](extras/church-events-calendar/churcheventslist-snippet)
4. [ChurchEventsRss Snippet](extras/church-events-calendar/churcheventsrss-snippet)

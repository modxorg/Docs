---
title: "Church Events Calendar"
_old_id: "614"
_old_uri: "revo/church-events-calendar"
---

<div>- [What is Church Events Calendar?](#ChurchEventsCalendar-WhatisChurchEventsCalendar%3F)
- [Required extra Packages](#ChurchEventsCalendar-RequiredextraPackages)
- [History](#ChurchEventsCalendar-History)
  - [Demo](#ChurchEventsCalendar-Demo)
  - [Download](#ChurchEventsCalendar-Download)
  - [Development and Bug Reporting](#ChurchEventsCalendar-DevelopmentandBugReporting)
- [Install](#ChurchEventsCalendar-Install)
  - [How to use](#ChurchEventsCalendar-Howtouse)
  - [System Settings](#ChurchEventsCalendar-SystemSettingsrevolution20%3ASystemSettings)
- [See Also](#ChurchEventsCalendar-SeeAlso)

</div>What is Church Events Calendar?
-------------------------------

ChurchEvents is a calendar extra for MODx Revolution was initially designed specifically for churches but would be useful in many other contexts. Churchevents now supports templates and translations. There are now 3 Snippets included: ChurchEventsCalendar, ChurchEventsList and ChurchEventsRss.

Required extra Packages
-----------------------

You must install the following packages before you can install ChurchEvents.

- FormIt
- ColorPicker

History
-------

ChurchEvents was written by Josh Gulledge to be a complete calendar for MODX, first release was in early 2011. In November 2011, ChurchEvents was rewretten to meet MODX coding standards.

### Demo

See a [live demo](http://www.joshua19media.com/modx-development/church-events.html).

### Download

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/churchevents>

### Development and Bug Reporting

ChurchEvents is on GitHub: <https://github.com/jgulledge19/Church-Events-Calendar>, report any issues or feature requests here: <https://github.com/jgulledge19/Church-Events-Calendar/issues>.

Install
-------

1. Install via the package manager

### How to use

To make a calendar on you page:

```
<pre class="brush: php">
[[!ChurchEventsCalendar?

]]

```Make a list of all prominent events with a limit of 10 on you page:

```
<pre class="brush: php">
[[!ChurchEventsList?  &prominent=`Yes`  &limit=`10`]]

```### [System Settings](/revolution/2.x/administering-your-site/settings/system-settings "System Settings")

These need to be created if they do not exist.

<table><tbody><tr><th>Name</th><th>Key</th><th>Field Type</th><th>Namespace</th><th>Area Lexicon</th><th>Default Value</th><th>Description</th></tr><tr><td>Allow Requests</td><td>churchevents.allowRequests</td><td>Yes/No</td><td>churchevents</td><td>ChurchEvents</td><td>Yes</td><td>Allow guests to request events.</td></tr><tr><td>Date Format</td><td>churchevents.dateFormat</td><td>Textfield</td><td>churchevents</td><td>ChurchEvents</td><td>%m/%d/%Y</td><td>This is the format that will appear on forms and when a date is presented. Default is %m/%d/%Y see php.net/strftime for all options.</td></tr><tr><td>Extended Fields</td><td>churchevents.extended</td><td>Textarea</td><td>churchevents</td><td>ChurchEvents</td><td> </td><td>A comma separated list of fields you want on the event form. Example: extend\_numberOfPeople,extend\_needCatering.</td></tr><tr><td>Page/Resource ID</td><td>churchevents.pageID</td><td>Textfield</td><td>churchevents</td><td>ChurchEvents</td><td> </td><td>This is the Page/Resource ID where the calendar will be located. This is what all generated URLs are based on.</td></tr><tr><td>Use Locations</td><td>churchevents.useLocations</td><td>Yes/No</td><td>churchevents</td><td>ChurchEvents</td><td>Yes</td><td>Use the location manager. If yes events will choose from a list of locations and events can check for conflicts. If no then each event can have a typed in a location and no event is checked for conflict.</td></tr><tr><td>RSS Page/Resource ID</td><td>churchevents.rssPageID</td><td>Textfield</td><td>churchevents</td><td>ChurchEvents</td><td> </td><td>This is the Page/Resource ID that will have the RSSEvents snippet and all generated RSS URLs will go here.</td></tr></tbody></table>See Also
--------

1. [ChurchEvents.MODX Manager functions](/extras/revo/church-events-calendar/churchevents.modx-manager-functions)
2. [ChurchEventsCalendar Snippet](/extras/revo/church-events-calendar/churcheventscalendar-snippet)
  1. [ChurchEvents.Managing events](/extras/revo/church-events-calendar/churcheventscalendar-snippet/churchevents.managing-events)
3. [ChurchEventsList Snippet](/extras/revo/church-events-calendar/churcheventslist-snippet)
4. [ChurchEventsRss Snippet](/extras/revo/church-events-calendar/churcheventsrss-snippet)
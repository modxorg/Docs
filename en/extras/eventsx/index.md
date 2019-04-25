---
title: "EventsX"
_old_id: "636"
_old_uri: "revo/eventsx"
---

Please note: Use this documentation on your own risk as it's not revised yet by the author of the extra.

## What is EventsX?

EventX is a calendar extra for MODX Revolution. EventsX shows upcoming (and previous) events on a (jQuery) calendar and/or upcoming events list.

## Features

- events management (create/update/remove/(de)activate)
- every event has a start and end date (can be the same date for single day events)
- jQuery calendar included
- languages:
  - english
  - dutch
  - german (thanks to Anselm Hannemann)
  - russian

## Requirements

- MODX Revolution (tested with 2.1.3pl)
- jQuery for the calendar (you can also create your own JSON based calendar)

## History

EventX was written by Jeroen Kenters and had its initial release Dec, 1st 2011.

## Download

It can be downloaded from within the MODX Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/eventsx>

## Development and Bug Reporting

EventX is on GitHub: <https://github.com/jkenters/EventsX>, report any issues or feature-requests here: <https://github.com/jkenters/EventsX/issues>.

## Roadmap

EventX has its issues and feature-requests on GitHub: <https://github.com/jkenters/EventsX/issues>. Nevertheless there's a roadmap:

- event registration
- bugfixing

## Install

1. Install via the package manager

## How to use

### To create a calendar on your page:

Go to components -> EventsX and create some events

(make sure they are active)

1. Add jQuery to your website template if necessary (only needed on pages where calendar will be used)
2. Copy & add /assets/components/calendar.js to your website template (only needed on pages where calendar will be used)
3. Copy & add /assets/components/jquery.calendar-widget.js to your website template (only needed on pages where calendar will be used)
4. Create a resource for the events calendar (or add it to your template(s))
5. Create a resource for the upcoming events list (see template example below)
6. Create a resource below that for a single event (see template example below)
7. Create a Context setting 'evxEventsPage' and set the 'upcoming events page' id as value
8. Create a Context setting 'evxEventPage' and set the 'single event page' id as value
9. Don't forget to save your context and clear the cache (context settings are cached)

## Templates

### example _events_ calendar template

``` html
<html>
<head>
<title>[[++site_name]] - [[*pagetitle]]</title>
<base href="[[++site_url]]" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="assets/components/eventsx/js/web/jquery.calendar-widget.js"></script>
<script type="text/javascript" src="assets/components/eventsx/js/web/calendar.js"></script>
<link rel="stylesheet" type="text/css" href="assets/components/eventsx/css/calendar.css" />
</head>
<body>
  <a href="" id="prevMonth">previous month</a> <a href="" id="nextMonth">next month</a>
  <div id="calendar"></div>
  [[*content]]
</body>
</html>
```

### example _upcoming events_ calendar template

``` html
<html>
<head>
<title>[[++site_name]] - [[*pagetitle]]</title>
<base href="[[++site_url]]" />
</head>
<body>
    [[!EventsX? &tpl=`evxEventTpl` &limit=`10`]]
    [[*content]]
</body>
</html>
```

### example _single event_ calendar template

``` html
[[!evxEvent?]]<html>
<head>
<title>[[++site_name]] - [[*pagetitle]]</title>
<base href="[[++site_url]]" />
</head>
<body>
    <p>Name: [[+event.name]]</p>
    <p>Start date: [[+event.startdate:strtotime:date=`%d-%m-%Y`]]</p>
    <p>End date: [[+event.enddate:strtotime:date=`%d-%m-%Y`]]</p>
    [[+event.description]]<!-- Description is a TinyMCE field by default, so no <p> here -->
    <h2>Location</h2>
    <p>[[+event.location]]<br /> [[+event.street]]<br /> [[+event.pc]]<br /> [[+event.city]]<br /> [[+event.region]]<br /> [[+event.country]]</p>
    <p><a href="[[+event.website]]">Visit website</a></p>
</body>
</html>
```

## See Also

1. [EventsX.Examples](extras/eventsx/eventsx.examples)

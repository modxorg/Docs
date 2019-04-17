---
title: "EventManager"
_old_id: "1356"
_old_uri: "revo/eventmanager"
---

Due to time constraints and better alternatives available, EventManager development is not likely to continue any time soon. Please use other Extras such as EventsX, mxCalendar or Church Events for your events needs.

The EventManager source will remain on Github, but no development is planned.

## What is EventManager?

EventManager is an addon for MODX Revolution which can be used to manage a list of events, as well as allow visitors to make a reservation online. Reservations may be listed on the Components -> EventManager page.

**EventManager is currently in development.**

## Requirements

- MODx Revolution 2.0.0-beta5 or later
- PHP5 or later

## History

Initial development started in February 2011 by Mark Hamstra. At this moment, pre-releases [may be available from Github](https://github.com/Mark-H/EventManager/downloads) and will not appear in the MODX Extras Repository untill a later, stable release.

### Public Releases

| Version    | Date      | Author       | Download                                                                                              |
| ---------- | --------- | ------------ | ----------------------------------------------------------------------------------------------------- |
| 0.1-alpha1 | 23/3/2011 | Mark Hamstra | [From Github](https://github.com/downloads/Mark-H/EventManager/eventmanager-0.1-alpha1.transport.zip) |

## Usage

Managing your events can be done from the Components > EventManager menu. You will see two tabs, where the first one shows the upcoming and current events and the second automatically archives older events. Rightclicking an event will reveal several options, including viewing reservations (_not in 0.1-alpha_), updating details, removing an event (_not in 0.1-alpha_) and duplicating event details (_not in 0.1-alpha_).

For displaying the events and allow website visitors to make a reservation, there are two snippets available:

- emListEvents: to list your events and template them as you wish.
- emNewReservationHook: a hook to use with FormIt to allow visitors to make a reservation which gets registered into the EventManager database.

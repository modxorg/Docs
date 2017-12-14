---
title: "EventManager"
_old_id: "1356"
_old_uri: "revo/eventmanager"
---

<div class="warning">Due to time constraints and better alternatives available, EventManager development is not likely to continue any time soon. Please use other Extras such as EventsX, mxCalendar or Church Events for your events needs.

The EventManager source will remain on Github, but no development is planned.

</div><div>- [What is EventManager?](../../x/TAIGAg#EventManager-WhatisEventManager%3F)
- [Requirements](../../x/TAIGAg#EventManager-Requirements)
- [History](../../x/TAIGAg#EventManager-History)
- [Public Releases](../../x/TAIGAg#EventManager-PublicReleases)
- [](../../x/TAIGAg#EventManager-)

- [Usage](../../x/TAIGAg#EventManager-Usage)

</div><a name="EventManager-WhatisEventManager%3F"></a>What is EventManager?
----------------------------------------------------------------------

EventManager is an addon for MODX Revolution which can be used to manage a list of events, as well as allow visitors to make a reservation online. Reservations may be listed on the Components -> EventManager page.

**EventManager is currently in development.**

<a name="EventManager-Requirements"></a>Requirements
----------------------------------------------------

- MODx Revolution 2.0.0-beta5 or later
- PHP5 or later

<a name="EventManager-History"></a>History
------------------------------------------

Initial development started in February 2011 by Mark Hamstra. At this moment, pre-releases [may be available from Github](https://github.com/Mark-H/EventManager/downloads) and will not appear in the MODX Extras Repository untill a later, stable release.

### <a name="EventManager-PublicReleases"></a>Public Releases

<div class="table-wrap"><table class="confluenceTable"><tbody><tr><th class="confluenceTh"> Version </th><th class="confluenceTh"> Date </th><th class="confluenceTh"> Author </th><th class="confluenceTh"> Download </th></tr><tr><td class="confluenceTd"> 0.1-alpha1 </td><td class="confluenceTd"> 23/3/2011 </td><td class="confluenceTd"> Mark Hamstra </td><td class="confluenceTd"> [From Github](https://github.com/downloads/Mark-H/EventManager/eventmanager-0.1-alpha1.transport.zip) </td></tr></tbody></table></div>### <a name="EventManager-"></a>

<a name="EventManager-Usage"></a>Usage
--------------------------------------

Managing your events can be done from the Components > EventManager menu. You will see two tabs, where the first one shows the upcoming and current events and the second automatically archives older events. Rightclicking an event will reveal several options, including viewing reservations (_not in 0.1-alpha_), updating details, removing an event (_not in 0.1-alpha_) and duplicating event details (_not in 0.1-alpha_).

For displaying the events and allow website visitors to make a reservation, there are two snippets available:

- emListEvents: to list your events and template them as you wish.
- emNewReservationHook: a hook to use with FormIt to allow visitors to make a reservation which gets registered into the EventManager database.
---
title: "emListEvents"
_old_id: "1357"
_old_uri: "revo/eventmanager/eventmanager.emlistevents"
---

emListEvents is a snippet which is a part of the EventManager addon that can be used to list events from its custom database.

This piece of documentation will be written in the (hopefully) near future.

## Properties

### Selection Properties

| Property         | Description                                                                                                                                                                                                                                                               | Default value |
| ---------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------- |
| &limit           | Limit the number of events to display.                                                                                                                                                                                                                                    | 3             |
| &reserveResource | The ID of the resource your reservation form is on. The script will make this into a link passing "eid=5", wherein 5 is the ID of the event, available in ?the reservationlink placeholder.                                                                               |               |
| &default         | The ID of the event to mark as the default. You can also use @GET to make the script look for a certain REQUEST parameter. You can reference the "default" placeholder in any output row to check against the current. See the included emRowSelectBoxTpl for a use case. | @GET eid      |

### Template Properties

| Property                        | Description                                                                                               | Default value                                                             |
| ------------------------------- | --------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------- |
| &rowTpl                         | The name of a chunk used to iterate over the events. Available placeholders: - eventid (int, primary key) | - date (time, formatted with strftime('%A %e/%m, %H:%M'))                 |
|                                 |                                                                                                           | - title (string)                                                          |
|                                 |                                                                                                           | - description (string)                                                    |
|                                 |                                                                                                           | - reservationlink (link to &reservationResource with &eid=5 passed to it) |
|                                 |                                                                                                           | - default (string, see &default property above)                           |
|                                 |                                                                                                           | - capacity (int)                                                          |
|                                 |                                                                                                           | - last\_signup `(i|nt)`                                                   |
| &emRowTpl (included in package) | `<p>[[+date]]</p> <p></p>[[+title]]</p> <p>[[+description]]<br />[[+reservationlink]]</p>`                |                                                                           |

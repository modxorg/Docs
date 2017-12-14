---
title: "EventManager.emListEvents"
_old_id: "1357"
_old_uri: "revo/eventmanager/eventmanager.emlistevents"
---

emListEvents is a snippet which is a part of the EventManager addon that can be used to list events from its custom database.

This piece of documentation will be written in the (hopefully) near future.

<a name="EventManager.emListEvents-%3FProperties"></a>?Properties
-----------------------------------------------------------------

### <a name="EventManager.emListEvents-SelectionProperties"></a>Selection Properties

<div class="table-wrap"><table class="confluenceTable"><tbody><tr><th class="confluenceTh"> Property </th><th class="confluenceTh"> Description </th><th class="confluenceTh"> Default value </th></tr><tr><td class="confluenceTd"> &limit </td><td class="confluenceTd"> Limit the number of events to display. </td><td class="confluenceTd"> 3 </td></tr><tr><td class="confluenceTd"> &reserveResource </td><td class="confluenceTd"> The ID of the resource your reservation form is on. The script will make this into a link passing "eid=5", wherein 5 is the ID of the event, available in ?the reservationlink placeholder. </td><td class="confluenceTd"> </td></tr><tr><td class="confluenceTd"> &default </td><td class="confluenceTd"> The ID of the event to mark as the default. You can also use @GET to make the script look for a certain REQUEST parameter. You can reference the "default" placeholder in any output row to check against the current. See the included emRowSelectBoxTpl for a use case. </td><td class="confluenceTd"> @GET eid </td></tr></tbody></table></div>### <a name="EventManager.emListEvents-TemplateProperties"></a>Template Properties

<div class="table-wrap"><table class="confluenceTable"><tbody><tr><th class="confluenceTh"> Property </th><th class="confluenceTh"> Description </th><th class="confluenceTh"> Default value </th></tr><tr><td class="confluenceTd"> &rowTpl </td><td class="confluenceTd"> The name of a chunk used to iterate over the events. Available placeholders: - eventid (int, primary key)
- date (time, formatted with strftime('%A %e/%m, %H:%M'))
- title (string)
- description (string)
- reservationlink (link to &reservationResource with &eid=5 passed to it)
- default (string, see &default property above)
- capacity (int)
- last\_signup (int)

</td><td class="confluenceTd"> emRowTpl (included in package): <p>\[\[+date\]\]</p> <p>\[\[+title\]\]</p> <p>\[\[+description\]\]<br />\[\[+reservationlink\]\]</p> </td></tr></tbody></table></div>
---
title: "ChurchEventsRss Snippet"
_old_id: "617"
_old_uri: "revo/church-events-calendar/churcheventsrss-snippet"
---

Available Properties
--------------------

Version 1.0

### Chunks

<table id="TBL1376497247006"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>rssTpl</td><td>Event RSS Item</td><td> </td></tr><tr><td>rssItemTpl</td><td>The RSS template</td><td> </td></tr></tbody></table>### Others

<table id="TBL1376497247007"><tbody><tr><th>Name</th><th>Description</th><th>Default Value</th></tr><tr><td>prominent</td><td>List prominent events, if set can be Yes/No</td><td>NULL</td></tr><tr><td>calendarID</td><td>Show one calendar, default shows all</td><td> </td></tr><tr><td>categoryID</td><td>Show one category, default shows all</td><td> </td></tr><tr><td>year</td><td>Choose a year to start from, default is current year(YYYY)</td><td> </td></tr><tr><td>month</td><td>Choose a month to start from, default is current month(MM)</td><td> </td></tr><tr><td>day</td><td>Choose a day to start from, default is current day (DD)</td><td> </td></tr></tbody></table>Creating a RSS Resource
-----------------------

In your MODX Manager you will need to create a new resource.

1. First, give it a title (for example: "Calendar Feeds") and an alias (for example: feed).
2. Next, change the template to use "(empty)", or in other words no template at all. You will get a popup asking if you are sure you want to change the template, click yes.
3. Move into the Page Settings tab and find the "Content Type". Open it, and set it to RSS.
4. Now you are ready to include the Snippet in the page content. If you are using TinyMCE or a similar rich text editor, disable it on the Page Settings tab to prevent odd things happening to the code.
5. Just paste in the code: ```
  <pre class="brush: php">
  [[!ChurchEventsRss?]]
  
  ```
6. Now save the resource
7. Copy the newly created page ID
8. Now go to System Settings (under System)
9. Sort the settings by clicking on the drop down and selecting churchevents.
10. Now find the RSS Page ID and double click on the value and paste in the page ID.

### Basic Example

Just put this code in the page content area:

```
<pre class="brush: php">
[[!ChurchEventsRss?]]

```
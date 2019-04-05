---
title: "ChurchEventsRss Snippet"
_old_id: "617"
_old_uri: "revo/church-events-calendar/churcheventsrss-snippet"
---

## Available Properties

Version 1.0

### Chunks

| Name | Description | Default Value |
|------|-------------|---------------|
| rssTpl | Event RSS Item |  |
| rssItemTpl | The RSS template |  |

### Others

| Name | Description | Default Value |
|------|-------------|---------------|
| prominent | List prominent events, if set can be Yes/No | NULL |
| calendarID | Show one calendar, default shows all |  |
| categoryID | Show one category, default shows all |  |
| year | Choose a year to start from, default is current year(YYYY) |  |
| month | Choose a month to start from, default is current month(MM) |  |
| day | Choose a day to start from, default is current day (DD) |  |

## Creating a RSS Resource

In your MODX Manager you will need to create a new resource.

1. First, give it a title (for example: "Calendar Feeds") and an alias (for example: feed).
2. Next, change the template to use "(empty)", or in other words no template at all. You will get a popup asking if you are sure you want to change the template, click yes.
3. Move into the Page Settings tab and find the "Content Type". Open it, and set it to RSS.
4. Now you are ready to include the Snippet in the page content. If you are using TinyMCE or a similar rich text editor, disable it on the Page Settings tab to prevent odd things happening to the code.
5. Just paste in the code: ``` php 
  [[!ChurchEventsRss?]]
  ```
6. Now save the resource
7. Copy the newly created page ID
8. Now go to System Settings (under System)
9. Sort the settings by clicking on the drop down and selecting churchevents.
10. Now find the RSS Page ID and double click on the value and paste in the page ID.

### Basic Example

Just put this code in the page content area:

``` php 
[[!ChurchEventsRss?]]
```
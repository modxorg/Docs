---
title: "mxCalendar"
_old_id: "684"
_old_uri: "revo/mxcalendar"
---

![](/download/attachments/38994084/logo-mxCalendar.png?version=1&modificationDate=1334336364000)

##### Working on finishing documentation, please visit <http://charlesmx.com/software/mxcalendar-revo.html> in the meantime, or if you have access feel free to help update.

About mxCalendar
----------------

mxCalendar is a extra created for both Evolution and Revolution to allow for full calendar editing using the native Manager of ModX. The calendar supports various views including calendar, list, and detail of which all views support the ModX template standards for fully customizing your themes. In addition mxCalendar supports feature rich calendar functions such as repeating events, Google Maps, cateogries, context, and unique calendars.

Installation
------------

### ModX Revolution:

It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/mxcalendar2>. When using the Package Management for direct download you can simply click on the "Install" button after download completes. If you choose to download from the extras site you will then need to FTP, or otherwise move, the transport package zip file to your "/core/packages/" folder first. After you have copied the transport zip file to your packages folder you will then need to launch Package Management from inside the Manager (ver 2.2.x) and then select the down arrow next to "Download Extras" and select the last option "Search Locally for Packages" and then find "mxcalendars" in the list of packages and choose "install".

### ModX Evolution:

You will need to download from the ModX Extras Repository, here <http://modx.com/extras/package/mxcalendar>. After you have downloaded you will need to follow these steps.

1. Unzip folder to your favorite place
2. Upload mxCalendar folder to your sites root /assets/modules/ folder
3. Copy contents of "snippets/mxCalendar.module.txt" file from the unzipped folder
4. Log into your Manager interface and goto the Modules > Manage Modules section
5. Select the New Module button
6. In the Module name field place mxcalendar
7. Past the content of "snippets/mxCalendar.module.txt" into the Module code (php) section
8. Select Save
9. Click the gear icon next to the new entry "mxcalendar" and select Run Module
10. You should see a screen saying the installation was successful, so click the Start button
11. Now you are in the new manager

Creating Calendars
------------------

**\*Note**: Calendars are only supported in the Revo version of mxCalendar

In the manager menu, select **Components** -> **mxCalendar**. Select the **Calendars** tab, click **Create New Calendar**. Name your calendar, check the active checkbox (if unchecked) and save.

? ![](/download/attachments/38994084/mxCalendarCreateCalendar.jpg?version=1&modificationDate=1352869552000)

Creating Categories
-------------------

In the manager menu, select **Components** -> **mxCalendar**. Select the **Categories** tab, click **Create New Category**. Name the category and enter options, save.

? ![](/download/attachments/38994084/mxCalendarCreateCategory.jpg?version=1&modificationDate=1352871857000)

Creating New Events
-------------------

In the manager menu, select **Components** -> **mxCalendar**. Select the **Events** tab, click **Create New Calendar Item**.

Select a context. Leave blank for all contexts. Give the event a name, select a calendar to associate the event with, a category, and start and end date/times.

Enter your event description in the rich text editor. This populates the \[\[\*content\]\] for the event detail view.   
![](/download/attachments/38994084/mxCalendarAddEvent.jpg?version=2&modificationDate=1352869709000)

In the Location tab, name the location and enter the address. Check "Display Map" to output a Google Map for the address that you entered.   
The example shown is the default Google Map display in a styled modal window (tplDetail or tplDetailModal).

 <span class="image-wrap" style="float: left">![](/download/attachments/38994084/mxCalendarEventLocation.jpg?version=1&modificationDate=1352869570000)</span>

<span class="image-wrap" style="float: right">![](/download/attachments/38994084/mxCalendarGoogleMapModalView.jpg?version=1&modificationDate=1352871182000)</span>

In the event tab, enter the event link URL.

![](/download/attachments/38994084/mxCalendarAddEventLink.jpg?version=1&modificationDate=1352870583000)  
Form Tab documentation forthcoming...

Using mxCalendar
----------------

Now to the best part, using mxCalendar to manage and display events.

Basic Use:
----------

After installation you should be able to call the default view (calendar) in your resource using:

```
<pre class="brush: php">
[[!mxcalendar?]]

```This should provide you with the calendar view and full page load on navigation. If you want to step things up a notch to use the AJAX navigation and modal view of event details we'd add two additional parameters to the snippet call. The first is the "ajaxResourceId" which should be a new resource (page) that is created using the (blank) template since we are returning this in the ajax response and simply modifying the DOM. The next thing we want to add is the "modalView" set to true to enable the modal display of the event details.

```
<pre class="brush: php">
[[!mxcalendar?
&ajaxResourceId=`43`
&modalView=`1`
]]

```Now when you reload your primary page with the mxcalendar snippet call, not the ajax one, you shoudl see the same display however now when you click on the arrows for previous and next months the content is loaded via ajax and not an entire URL page reload. The second thing you should notice is now when you click on and event title in the calendar view it displayes the event detail view in a nice modal window. ah... that's nice

Parameters / Properties / Settings
----------------------------------

<table><tbody><tr><td>**Parameters**</td><td>**Type**</td><td>**Default**</td><td>**Scope**</td><td>**Description**</td></tr><tr><td>theme</td><td>string</td><td>default</td><td>calendar, mini, list, detail</td><td>Set the theme to use; looks for theme files in the “/assets/components/mxcalendars/theme/” folder. You can create a new one by simply copying the default or traditional folder and modify then update the parater to your folder name.</td></tr><tr><td>resourceId</td><td>int</td><td>(current resource)</td><td>calendar, mini, list, detail</td><td>This sets the resource ID to use when creating links that use the non-ajax parameter</td></tr><tr><td>isLocked</td><td>boolean</td><td>0 (FALSE)</td><td>calendar, mini, list, detail</td><td>When set to true the display type for this snippet call will not be changed regardless of any passed parameters or query string values; used when you have multiple snippet calls on a single page</td></tr><tr><td>displayType</td><td>string</td><td>calendar</td><td>default</td><td>Set the default display mode when not passed in snippet call or query string</td></tr><tr><td>elStartDate</td><td>date</td><td>now</td><td>list</td><td>Uses PHP strtotime to set as the minimum date start listing</td></tr><tr><td>elEndDate</td><td>date</td><td>+4 weeks</td><td>list</td><td>Set the last date you want as the filter for returning dates in the future; uses PHP strtotime function</td></tr><tr><td>tplListItem</td><td>String (chunk)</td><td>el.itemclean</td><td>list</td><td>The chunk you want to use for each individual event item returned in the list</td></tr><tr><td>tplListHeading</td><td>String (chunk)</td><td>el.listheading</td><td>list</td><td>The chunk you want to use for month heading sperator in list view; to display the monthly heading make it empty</td></tr><tr><td>tplListWrap</td><td>String (chunk)</td><td>el.wrap</td><td>list</td><td>The chunk that is the outer most wrapper for the list view, often contains the global heading “Upcoming Events”</td></tr><tr><td>eventListlimit</td><td>int</td><td>5</td><td>list</td><td>Set the max number of event items to display in the events list this includes the repeating events for a given event</td></tr><tr><td>sort</td><td>string (column name)</td><td>startdate</td><td>calendar, mini, list, detail</td><td>Set the default sorting order, often this is not modified and helps performance when dealing with the limits</td></tr><tr><td>dir</td><td>string (ASC, DESC)</td><td>ASC</td><td>calendar, mini, list, detail</td><td>Set the sort direction to use</td></tr><tr><td>limit</td><td>int</td><td>99</td><td>calendar, mini, list, detail</td><td>Sets the max number of items to return from the data base query</td></tr><tr><td> contextFilter</td><td> string (comma seperated)</td><td>empty; ?all + current context</td><td>calendar, mini, list, detail</td><td>Sets which context to filter out events for, by defaullt it list global events where no context has been set plus the current context. In order to disable the global events from display you have to set the contextFilter value to the current context, thus over writing the default value.</td></tr><tr><td>calendarFilter</td><td>string (comma seperated list of category id)</td><td>null</td><td>calendar, mini</td><td>Sets a calendar filter based on the events associated calendar. By default all events are displayed regardless of the calendar they are associated to. You must set this to the value of a category id or multiple category id's separated by a comma (,).</td></tr><tr><td>elDirectional</td><td>date   
</td><td>future   
</td><td>calendar, mini, list, detail   
</td><td>Sets the direction of the list based on the elStartDate parameter. By default, all listed events are future events. To show a list of past events, set this to `past` (make sure to include the elStartDate=`now` for a past event list display.)   
</td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td>**Text and Date Formatting**</td><td> </td></tr><tr><td>dateformat</td><td>strftime</td><td>%<del>Y</del>%m-%d</td><td>calendar, mini, list, detail</td><td>Uses the PHP strftime to return a pre-formatted date stamp; Extended value of %O to replace the date(S) type. English ordinal suffix for the day of the month, 2 characters (_st_, _nd_, _rd_ or _th_). Use this to help speed up render time.</td></tr><tr><td>timeformat</td><td>strftime</td><td>%H:%M %p</td><td>calendar, mini, list, detail</td><td>Uses the PHP strftime to return a pre-formatted time stamp; Extended value of %O to replace the date(S) type. English ordinal suffix for the day of the month, 2 characters (_st_, _nd_, _rd_ or _th_). Use this to help speed up render time.</td></tr><tr><td>dateseperator</td><td>string</td><td>/</td><td>calendar, mini, list, detail</td><td>Set the date seperator string to use in date stamps</td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td>**Calendar view**</td><td> </td></tr><tr><td>activeMonthOnlyEvents</td><td>boolean</td><td>0 (FALSE)   
</td><td>calendar</td><td>Display only events in the days of the current month</td></tr><tr><td>highlightToday</td><td>boolean</td><td>1 (TRUE)   
</td><td>calendar</td><td>Adds the value of @todayClass to the current date</td></tr><tr><td>todayClass</td><td>String</td><td>today</td><td>calendar, mini</td><td>Set the CSS class name to use for the current date</td></tr><tr><td>noEventsClass</td><td>String</td><td>mxcDayNoEvents</td><td>calendar,mini</td><td>Set the CSS class name to apply to date containers where no events are found</td></tr><tr><td>hasEventsClass</td><td>String</td><td>mxcEvents</td><td>calendar, mini</td><td>Set the CSS class name to apply to date containers where events are found</td></tr><tr><td>tplEvent</td><td>String (chunk)</td><td>tplEvent</td><td>calendar, mini</td><td>Set the template chunk name to use for each event</td></tr><tr><td>tplDay</td><td>String (chunk)</td><td>tplDay</td><td>calendar, mini</td><td>Set the template chunk name to use for each day of the month, wrapper chunk for the tplEvent</td></tr><tr><td>tplWeek</td><td>String (chunk)</td><td>tplWeek</td><td>calendar, mini</td><td>Set the template chunk name to use for each week of the month, outer wrapper for the tplDay</td></tr><tr><td>tplMonth</td><td>String (chunk)</td><td>tplMonth</td><td>calendar, mini</td><td>Set the template chunk name to use for the month, outer wrapper for the tplWeek</td></tr><tr><td>tplHeading</td><td>String (chunk)</td><td>tplHeading</td><td>calendar, mini</td><td>Set the template chunk name to use for the calendar heading, this chunk contains the calendar navigation controls</td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td>**Detail view**</td><td> </td></tr><tr><td>tplDetail</td><td>String (chunk)</td><td>tplDetail</td><td>all</td><td>Set the template chunk to display the event details</td></tr><tr><td>tplDetailModal</td><td>String (chunk)</td><td>tplDetailModal</td><td>all</td><td>Set the template chunk to display the event details in a modal view only</td></tr><tr><td>mapHeight   
</td><td>String/Int   
</td><td>500px   
</td><td>all   
</td><td>Set the Google Map height in the event details   
</td></tr><tr><td>mapWidth   
</td><td>String/Int   
</td><td>500px   
</td><td>all   
</td><td>Set the Google Map width in the event details</td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td>**Categories list**</td><td> </td></tr><tr><td>showCategories</td><td>boolean</td><td>1 (TRUE)</td><td>calendar, mini</td><td>Set to true to enable the listing of categories to filter events by; set to false to disable listing of categories</td></tr><tr><td>tplCategoryWrap</td><td>String (chunk)</td><td>tplCategoryWrap</td><td>calendar, mini</td><td>Set the chunk to wrap all the category listing output in</td></tr><tr><td>tplCategoryItem</td><td>String (chunk)</td><td>tplCategoryItem</td><td>calendar, mini</td><td>Set the template chunk to use for the category listing items</td></tr><tr><td>labelCategoryHeading</td><td>String</td><td>lexicon: mxcalendars.label\_category\_heading</td><td>calendar, mini</td><td>Set the category listing heading label text</td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td>**Aux Parameters/Properties (global)**</td><td> </td></tr><tr><td>addJQ</td><td>boolean</td><td>1 (TRUE)</td><td>all</td><td>Add the jQuery library source JS file as defined in the @jqLibSrc property</td></tr><tr><td>jqLibSrc</td><td>String</td><td><https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js></td><td>all</td><td>Set the URL to the jQuery library you would like mxCalendar to load</td></tr><tr><td>usemxcLib</td><td>boolean</td><td>1 (TRUE)</td><td>all</td><td>Use the stand-a-lone modal windows JS library packaged with mxCalendar</td></tr><tr><td>ajaxResourceId</td><td>int</td><td>null</td><td>all</td><td>Set the document resource id that you has the base mxcalendars snippet call and **_blank template_** defined for use with the modal display</td></tr><tr><td>modalView</td><td>boolean</td><td>0 (FALSE)</td><td>all</td><td>Enable or disable the modal view of events</td></tr><tr><td>modalSetWidth</td><td>String/Int</td><td>80.00%</td><td>all</td><td>Set the value for the modal windows display width, supports percents (%) and fixed width (500px)</td></tr><tr><td>modalSetHeight</td><td>String/Int</td><td>70.00%</td><td>all</td><td>Set the value for the modal windows display height, supports percents (%) and fixed width (500px)</td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td>**Google Map**</td><td> </td></tr><tr><td>gmapLib</td><td>String</td><td><http://maps.google.com/maps/api/js?sensor=false></td><td>detail</td><td>Set the Google Map API URL to use for your site</td></tr><tr><td>gmapId</td><td>String</td><td>map</td><td>detail</td><td>Set the node id where the Google Map object should be displayed</td></tr><tr><td>gmapDefaultZoom</td><td>Int</td><td>13</td><td>detail</td><td>Set the Google Map display default zoom level</td></tr><tr><td>gmapAPIKey</td><td>String</td><td>null</td><td>detail</td><td>Set the Google Map API key to your registered API for additional tracking and increased request (higher limits)</td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td>**Holiday (coming soon)**</td><td> </td></tr><tr><td>holidays</td><td>Struct</td><td>null</td><td>all</td><td>coming soon</td></tr><tr><td>holidayDisplayEvents</td><td>Boolean</td><td>1 (TRUE)</td><td>all</td><td>coming soon</td></tr><tr><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td>**Debugging**</td><td> </td></tr><tr><td> </td><td> </td><td> </td><td> </td><td>use with caution, so not listed and not recommended to use</td></tr><tr><td>debugTimezone</td><td>boolean</td><td>0 (FALSE)</td><td>all</td><td>Set to true to see how your dates are being processed for your server settings</td></tr><tr><td>debug</td><td>boolean</td><td>0 (FALSE)</td><td>all</td><td>Set to true to enable all kids of fun output of the calendar processing, helps to trouble shoot any issues with the calendar   
  
</td></tr></tbody></table>Demo
----
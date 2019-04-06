---
title: "ChurchEvents.Managing events"
_old_id: "807"
_old_uri: "revo/church-events-calendar/churcheventscalendar-snippet/churchevents.managing-events"
---

## Adding an Event

Below are instructions based on the default template, if you have customized your calendar then you may not have that same instructions.

1. Login to MODX and go to the calendar(front end) page.
2. Look for the date you wish to add an event to and click on the \[ + \] link. 
  ![](/download/attachments/37126224/add-plus.gif?version=1&modificationDate=1323800921000)
3. Now fill out the form.

### Choosing a day and time

Add a standard event that only occurs once

1. Select No for the Does this event repeat.
2. Select the date that you wish to have the event on.
3. Now you will need to select the option if the event is timed or if it is an all-day event. An example of a timed event would be a meeting that happens at 7pm and would last for an hour. 
  _Note with either option if you are using the Location Management setting and the location you choose for this event is checking for conflicts no one else will be able to put in an event that will overlap this event._
    1. If you select Yes, you will have a Start Time and Duration that must be filled in, you also have an optional setup time. Example would be event is from 7pm to 8pm so select 7:00 pm for the start time and then select 1:00 for the duration(length of event)
    2. If you select No there are no additional options and this event will show up as All Day.

### Repeating event options

There are three repeating event options, Daily, Weekly and Monthly. Some examples of when you would use the Daily option: you have a four day event that is on Monday, Tuesday, Wednesday and Thursday. Another example would be you have an event that happens every third day (regardless of week/month). An example when you would use Weekly would be if you have an event that is every Tuesday and Thursday or every other week on Monday. An example of when you would want to use the monthly option would be if you have a meeting that happens on the first Monday of every month.

#### How to use the Daily option

1. Select the daily option
2. Chose how often you want the days to repeat, from Every Day to Every Seventh Day
3. Now select the day that the event starts on
4. Select the day that the event ends on

**Examples**:

1. An event that repeats every day from Monday 12/5 to Friday 12/9. 
    1. You would select repeat Every day
    2. Select the start day to be 12/5
    3. And then select the end date to be 12/9.
2. An event that repeats every other day starting on Sunday 12/4 and ending Friday 12/16. The event will be Sun, Tues, Thurs, Sat, Mon, Wed and Fri. 
    1. Select repeat Every third day
    2. Select the start day of 12/4
    3. Select the end day of 12/16

#### Using the Weekly repeating option

1. Select the weekly option
2. Chose how often you want the weeks to repeat, from Every week to Every sixth week
3. Now you want to select the days of the week that your event will be on.
4. Now select the day that the event starts on
5. Select the day that the event ends on

**Examples**:

1. You have an event on every Monday, Wednesday, and Friday that last for the month of January 2012. 
    1. Select repeat weekly
    2. Now select Monday, Wednesday and Friday
    3. Select the start date 1/02/2011
    4. And the end date 1/30/2011
2. You have an event that repeats on Tuesday’s every other week. 
    1. Select repeat weekly
    2. Select Tuesday
    3. Select the start date and end date.

#### **Monthly repeating**

Monthly repeating can seem a little overwhelming until you understand how it works so don’t be afraid to try them out.

1. Select the monthly option
2. Chose how often you want the month to repeat, from Every month to Every sixth month
3. Now you want to select the days and week that your event will be on. On the grid you will see on the top the names of the days and on the left corresponds to the position of day, first to fifth in the month. Let’s look at December 2011 for example the **first Sunday** in December is the 4th and so on. If you were to take December 2011 and put it into this grid this is what it would look like: 
  ![](/download/attachments/37126224/month-repeat-explain.png?version=1&modificationDate=1323800921000)
4. Now select the day that the event starts on
5. Select the day that the event ends on

**Examples**:

1. The first Monday of every month there is an event. 
    1. Select Every month
    2. Select the Sunday in the First Week row.
    3. Select the day that the event starts on and the day the event ends on.
2. An event that occurs on the second Tuesday and forth Monday of every month. 
    1. Select Every month
    2. Select the Tuesday in the second week row
    3. Select the Monday in the fourth week row.

## Edit an event(s)

1. From the calendar view click on the event title
2. You should now see the event description page and if you are logged in and have permissions you will see an Edit this event link, click on it.
3. All options should be the same as Add an event except if the event is a repeating event you will have an additional option. 
  ![](/download/attachments/37126224/save-repeat-option.png?version=1&modificationDate=1323801905000)
  Selecting the Override all option will update and possibly override events if you have updated them that are connected.

## Delete an event

1. From the calendar view click on the event title
2. You should now see the event description page and if you are logged in and have permissions you will see a Remove this event link, click on it.
3. You will now have to confirm that you want to delete the event. If the event is a repeating event you will need to select if you want to delete all or only the selected instance. 
  ![](/download/attachments/37126224/delete-repeat-option.png?version=1&modificationDate=1323802223000)

## Requesting an event

If you have the System Setting allowRequests, under churchevents namespace, set to Yes then users that are not logged in(guests) may submit requests. These requests are not published on the calendar until they get approved by an admin. An email will be send out once the event has been submitted. Requesting an event is the similar to adding an event except without the admin options. See Adding an Event for further instructions.

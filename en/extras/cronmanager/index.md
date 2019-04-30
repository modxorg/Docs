---
title: "CronManager"
_old_id: "624"
_old_uri: "revo/cronmanager"
---

## What is Cron Manager

The cron manager for MODx makes it possible to execute snippets by the crontab of the server. By using the manager of MODX Revolution you can simply add new snippets to the cron list.

Using snippets for your cron management also requires properties and you can add properties manually by setting up key value pairs but also with a propertyset (name).

## Installation

First install the package via the Package Management inside MODX Revolution.

After that, you need to configure the cron script in your servers crontab list. On most hostings is control panel like Direct Admin available en mostly you're able to configure cronjobs via that control panel. People who have access to there server with SSH could add the cronjob with the "crontab -e" command. Add the following line as cronjob. (Note: in some cases this command needs some modifications, you could discuss it with your provider).

``` php
cd /path/to/your/modx/installation/assets/components/cronmanager/ && php cron.php
```

We advise you to execute it on every minute, every day in every month (\* to all: m h dom mon dow). But when you're sure there are no needs for an every minute cronjob, you could change the crontab interval by your own needs.

## Usage examples

To use the component, navigate to your manager and click on "Components > Cron Manager".

### Create new cronjob

Here you can create a new cronjob by clicking on the "new" button.

![](/download/attachments/35095318/create-new-cronjob.JPG)

You see the fields "Snippet", "Minutes" and "Snippet properties".

**Snippet:** You can start typing the name of the snippet or browse by clicking the down-arrow
**Minutes:** Enter the minutes you want to execute the snippet on. For example; if you enter 15, the snippet runs every 15 minutes (when the crontab on the server is configured correctly)
**Snippet properties:** Here you can enter properties for the snippet. You could enter them in key-value pair (each on a new line) or also as JSON object. Maybe a better way is using propertysets, in this case you can add the name of the [propertyset](making-sites-with-modx/customizing-content/properties-and-property-sets "Properties and Property Sets").

_Note: after adding a cronjob it isn't active directly. You must specify the active state to yes in the last column in the overview._

### Explanation of the overview

In the overview of the cronjobs you're able to see directly wich snippets are in the cronjob and the minute interval. Also there is are two columns with the titles "Last run" and "Next run". These columns contains a date and time for when the cronjob is runned at last and when it should run the next time. The last column says if the cronjob is active or not. This is usefull for those who want to disable the cronjob temporary.

### Log for each cronjob

Each snippet in a cronjob could return some values, for testing purposes or something like that. Every return value of a snippet will be logged to the cronjob log inside MODx. You can view this log by clicking with the right mouse button on the record you want to view the log from.

![](/download/attachments/35095318/viewlog-action.JPG?version=1&modificationDate=1307298900000)

The log is a simple overview of all the return messages, and also a timestamp is shown there.

## Development and bug reporting

The Cron Manager is developped in GitHub on: [https://github.com/bertoost/MODx-CronManager/](http://github.com/bertoost/MODx-CronManager/)

Bugs and new ideas could be entered here: [https://github.com/bertoost/MODx-CronManager/issues/](http://github.com/bertoost/MODx-CronManager/issues/)

## Comments (1)

1. ![User icon: jgulledge19](/s/1911/69/_/images/icons/profilepics/anonymous.png "jgulledge19")
  
  Sep 28, 2012
  
### [Josh Gulledge](/display/~jgulledge19) says:
  
  This might help some that have shared hosting. For my blog site the host is usi...
  
  This might help some that have shared hosting.
  
  For my blog site the host is using cPanel, this was the command that was needed to work:

``` php
php -q public\_html/assets/components/cronmanager/cron.php
```

  ![](/download/attachments/35095318/cron-setup.png?version=1&modificationDate=1348836956000)

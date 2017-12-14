---
title: "Databackup"
_old_id: "626"
_old_uri: "revo/databackup"
---

<div>- [What is Databackup?](#Databackup-WhatisDatabackup%3F)
- [History](#Databackup-History)
  - [Download](#Databackup-Download)
  - [Development and Bug Reporting](#Databackup-DevelopmentandBugReporting)
- [How to Use](#Databackup-HowtoUse)
  - [How to use snippet with getCache](#Databackup-HowtousesnippetwithgetCache)
  - [System Settings](#Databackup-SystemSettingsrevolution20%3ASystemSettings)
  - [Available Properties](#Databackup-AvailableProperties)

</div> What is Databackup? 
---------------------

 Databackup is a [Snippet](/revolution/2.x/developing-in-modx/basic-development/snippets "Snippets") for MODX Revolution that will backup your MODX MySQL database as one sql dump file and/or each table as a SQL dump as well as other MySQL databases. The extra does use PDO so it might be able to do other databases, like MSSQL, as is but I have not tested this.

 History 
---------

 Databackup was written by Josh Gulledge as an easy way to keep data backups, and first released on August 12th, 2011.

###  Download 

 It can be downloaded from within the MODx Revolution manager via [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/databackup>

###  Development and Bug Reporting 

 Databackup is stored and developed in GitHub, and can be found here:<https://github.com/jgulledge19/DataBackup>

 Bugs can be filed here: <https://github.com/jgulledge19/DataBackup/issues>

 How to Use 
------------

1. Install via the package manager
2. Set the databackup.folder setting to something that is above your web root. The default is core/components/databackup/dumps/
3. Set the purge time option (databackup.pruge) if you want this to be different, the default is 1814400, which is 21 days.
4. Set up Cron Manager: [display/ADDON/CronManager](/extras/revo/cronmanager) and then Create a new job.
5. Select the backup snippet and then select in minutes how often you would like this to run. Every 24 hours is 1440 minutes.

###  How to use snippet with getCache 

 See: [getcache](http://www.jasoncoward.com/technology/2010/10/simple-content-caching-with-getcache.html) for getCache examples.

 This is a simple backup your site every 24 hours(assuming the page is visited) or less if you flush the cache. It will also purge the backups older then 21 days.

```
<pre class="brush: php">[[!getCache?
&element=`backup`
&excludeTables=`my_custom_table,my_other_custom_table`
&cacheExpires=`86400`
]]

```###  [System Settings](/revolution/2.x/administering-your-site/settings/system-settings "System Settings")

 These need to be created if they do not exist.

<table><tbody><tr><th> Name </th> <th> Key </th> <th> Field Type </th> <th> Namespace </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> Folder </td> <td> databackup.folder </td> <td> Textfield </td> <td> databackup </td> <td> This is the folder path that will save you .sql files to. PHP must have write permissions to this folder. </td> <td> {core\_path}components/databackup/dumps/ </td> </tr><tr><td> Purge Files </td> <td> databackup.purge </td> <td> Textfield </td> <td> databackup </td> <td> Purge old files that are older then the current time - seconds. Default is 1814400 (21 days). </td> <td> 1814400 </td></tr></tbody></table><div class="info"> **WARNING**   
 Be careful where you make the file path for the purge setting: databackup.folder. If you place this in an existing folder, all files older than the purge date will be delete. It is recommended that you create a new folder for your backups that is above your public WWW folder. </div>###  Available Properties 

 There is also a sample backupMany snippet. You can modify this example snippet to backup other databases.

 Version 1.1

<table id="TBL1376497247008"><tbody><tr><th> Name </th> <th> Description </th> <th> Default Value </th> </tr><tr><td> database </td> <td> The database you wish to backup. </td> <td> modx </td> </tr><tr><td> includeTables </td> <td> Comma separated list of tables to include. All other tables will be excluded if this option is used. </td> <td> NULL </td> </tr><tr><td> excludeTables </td> <td> Comma separated list of tables to exclude. All other tables will be included. </td> <td> NULL </td> </tr><tr><td> writeFile </td> <td> Boolean This will write one large SQL dump file. options: true/false </td> <td> true </td> </tr><tr><td> writeTableFiles </td> <td> Boolean This will write each tables as a individual SQL dump file. options: true/false </td> <td> true </td> </tr><tr><td> commentPrefix </td> <td> This are the SQL comment prefix. </td> <td> – </td> </tr><tr><td> commentSuffix </td> <td> If the comment for SQL need an ending suffix. Default is empty </td> <td> </td> </tr><tr><td> newLine </td> <td> The value to print a new line in SQL files. </td> <td> \\n </td> </tr><tr><td> useDrop </td> <td> Boolean true/false to use the the DROP TABLE in the SQL files </td> <td> true </td> </tr><tr><td> createDatabase </td> <td> Boolean true/false to use a CREATE DATABASE command in the SQL files </td> <td> false </td></tr></tbody></table>
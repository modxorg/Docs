---
title: "Databackup"
_old_id: "626"
_old_uri: "revo/databackup"
---

##  What is Databackup? 

 Databackup is a [Snippet](developing-in-modx/basic-development/snippets "Snippets") for MODX Revolution that will backup your MODX MySQL database as one sql dump file and/or each table as a SQL dump as well as other MySQL databases. The extra does use PDO so it might be able to do other databases, like MSSQL, as is but I have not tested this.

##  History 

 Databackup was written by Josh Gulledge as an easy way to keep data backups, and first released on August 12th, 2011.

###  Download 

 It can be downloaded from within the MODx Revolution manager via [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), or from the MODx Extras Repository, here: <http://modx.com/extras/package/databackup>

###  Development and Bug Reporting 

 Databackup is stored and developed in GitHub, and can be found here:<https://github.com/jgulledge19/DataBackup>

 Bugs can be filed here: <https://github.com/jgulledge19/DataBackup/issues>

##  How to Use 

1. Install via the package manager
2. Set the databackup.folder setting to something that is above your web root. The default is core/components/databackup/dumps/
3. Set the purge time option (databackup.pruge) if you want this to be different, the default is 1814400, which is 21 days.
4. Set up Cron Manager: [display/ADDON/CronManager](/extras/cronmanager) and then Create a new job.
5. Select the backup snippet and then select in minutes how often you would like this to run. Every 24 hours is 1440 minutes.

###  How to use snippet with getCache 

 See: [getcache](http://www.jasoncoward.com/technology/2010/10/simple-content-caching-with-getcache.html) for getCache examples.

 This is a simple backup your site every 24 hours(assuming the page is visited) or less if you flush the cache. It will also purge the backups older then 21 days.

``` php 
[[!getCache?
&element=`backup`
&excludeTables=`my_custom_table,my_other_custom_table`
&cacheExpires=`86400`
]]
```

###  [System Settings](administering-your-site/settings/system-settings "System Settings")

 These need to be created if they do not exist.

| Name        | Key               | Field Type | Namespace  | Description                                                                                               | Default Value                            |
| ----------- | ----------------- | ---------- | ---------- | --------------------------------------------------------------------------------------------------------- | ---------------------------------------- |
| Folder      | databackup.folder | Textfield  | databackup | This is the folder path that will save you .sql files to. PHP must have write permissions to this folder. | {core\_path}components/databackup/dumps/ |
| Purge Files | databackup.purge  | Textfield  | databackup | Purge old files that are older then the current time - seconds. Default is 1814400 (21 days).             | 1814400                                  |

 **WARNING** 
 Be careful where you make the file path for the purge setting: databackup.folder. If you place this in an existing folder, all files older than the purge date will be delete. It is recommended that you create a new folder for your backups that is above your public WWW folder. 

###  Available Properties 

 There is also a sample backupMany snippet. You can modify this example snippet to backup other databases.

 Version 1.1

| Name            | Description                                                                                          | Default Value |
| --------------- | ---------------------------------------------------------------------------------------------------- | ------------- |
| database        | The database you wish to backup.                                                                     | modx          |
| includeTables   | Comma separated list of tables to include. All other tables will be excluded if this option is used. | NULL          |
| excludeTables   | Comma separated list of tables to exclude. All other tables will be included.                        | NULL          |
| writeFile       | Boolean This will write one large SQL dump file. options: true/false                                 | true          |
| writeTableFiles | Boolean This will write each tables as a individual SQL dump file. options: true/false               | true          |
| commentPrefix   | This are the SQL comment prefix.                                                                     | –             |
| commentSuffix   | If the comment for SQL need an ending suffix. Default is empty                                       |               |
| newLine         | The value to print a new line in SQL files.                                                          | \\n           |
| useDrop         | Boolean true/false to use the the DROP TABLE in the SQL files                                        | true          |
| createDatabase  | Boolean true/false to use a CREATE DATABASE command in the SQL files                                 | false         |
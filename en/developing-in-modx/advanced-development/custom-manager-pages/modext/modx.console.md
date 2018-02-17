---
title: "MODx.Console"
_old_id: "1056"
_old_uri: "2.x/developing-in-modx/advanced-development/custom-manager-pages/modext/modx.console"
---

- [What is the MODx.Console?](#MODx.Console-WhatistheMODx.Console%3F)
- [How it Works](#MODx.Console-HowitWorks)
- [Usage](#MODx.Console-Usage)



## What is the MODx.Console?

The MODx.Console is a special Ext widget that has been built to act as a terminal-like output console for processors that need to return more detailed information. It can be found in [Package Management](developing-in-modx/advanced-development/package-management "Package Management"), clearing the cache, or in other areas of MODX:

![](/download/attachments/34636260/modx-console.png?version=1&modificationDate=1302185248000)

## How it Works

The Console relies on two parameters to function:

- **register** - The registry to pull from
- **topic** - The topic in the registry to read

First off, the Console starts up a Polling panel that queries the Registry with those two variables. It will continue to poll the Registry until the Console JS object has had its "complete" event fired; or a COMPLETED message is sent. Once that occurs, the Console will stop polling the Registry, and its "OK" button will be enabled. The user can then choose to close the console or download the output to a file. Once the user clicks the OK button, the "shutdown" event will be fired on the console.

## Usage

The console can easily be hooked up to nearly any processor and JS custom application in MODX. Simply instantiate a new console object:

```
<pre class="brush: php">
var topic = '/mytopic/';
var register = 'mgr';
var console = MODx.load({
   xtype: 'modx-console'
   ,register: register
   ,topic: topic
   ,show_filename: 0
   ,listeners: {
     'shutdown': {fn:function() {
         /* do code here when you close the console */
     },scope:this}
   }
});
console.show(Ext.getBody());

```Note here that you fire up the console, and then load the topic that you want (make sure to include the beginning and ending slashes).

When you've got that loaded, you can send a request to your processor:

```
<pre class="brush: php">
MODx.Ajax.request({
    url: URL_TO_MY_CONNECTOR
    ,params: {
        action: MY_ACTION
        ,register: register
        ,topic: topic
    }
    ,listeners: {
        'success':{fn:function() {
            console.fireEvent('complete');
        },scope:this}
    }
});

```You'll need to specify the URL of your connector url, as well as the action you want to load (the processor). In your processor, you can output to the Console by using $modx->log:

```
<pre class="brush: php">
$modx->log(modX::LOG_LEVEL_INFO,'An information message in normal colors.');
$modx->log(modX::LOG_LEVEL_ERROR,'An error in red!');
$modx->log(modX::LOG_LEVEL_WARN,'A warning in blue!');

```Once you're done with your processor, you should do two things. One, fire off a log message with just "COMPLETED" in the body:

```
<pre class="brush: php">
$modx->log(modX::LOG_LEVEL_INFO,'COMPLETED');

```This tells the console to stop polling, and enables the "OK" button which closes the console.

MODX Revolution 2.1.0-rc2 and later do not need you to send the COMPLETED message in the registry - just firing the 'complete' event on the JS Console object will work. All prior versions require the COMPLETED message.

After that, once the user clicks the "OK" button, MODx.Console will fire its "shutdown" event. Here you can fire any code you wish to do at that time.

Modx.Ajax.request expects a 'success' key value return in json, so you have to return 'success' in the processor. Otherwise the success listener will never fire.

To return text, html, or anything non json, the native Ext.Ajax.request can be used.
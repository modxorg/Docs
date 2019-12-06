---
title: "Plugins"
_old_id: "843"
_old_uri: "revo/filedownload-r/filedownload-r.plugins"
---

This feature is available since v.1.0.0-pl

## Events

There are still a few events that have been provided, because again, this is small script.
But the event spots are really useful:

- **OnLoad**
  Just when the script is loaded, this event trigger also calls all the plugins that want to do their dependencies, for instance
- **BeforeDirOpen**
  Before the folder is scanned/opened
- **AfterDirOpen**
  After the folder is scanned/opened
- **BeforeFileDownload**
  Before the file is downloaded
- **AfterFileDownload**
  After the file is downloaded

The complete reference actually is written directly in the **core/components/filedownload/plugins/filedownloadplugin.events.php** file, including their available properties and the expected results.

``` php
<?php

$events = array(
    'OnLoad' => array(
        'properties' => array(),
        'returnType' => array(
            NULL
        )
    ),
    'BeforeDirOpen' => array(
        'properties' => array(
            'dirPath'
        ),
        'returnType' => array(
            NULL,
            FALSE,
            'continue'
        )
    ),
    'AfterDirOpen' => array(
        'properties' => array(
            'dirPath',
            'contents'
        ),
        'returnType' => array(
            NULL,
            FALSE,
            'continue'
        )
    ),
    'BeforeFileDownload' => array(
        'properties' => array(
            'hash',
            'ctx',
            'filePath',
            'count'
        ),
        'returnType' => array(
            NULL,
            FALSE
        )
    ),
    'AfterFileDownload' => array(
        'properties' => array(
            'hash',
            'ctx',
            'filePath',
            'count'
        ),
        'returnType' => array(
            NULL
        )
    ),
);
return $events;
```

## &plugins Property

To call the plugins, you need to call it inside the snippet, as a JSON format, eg:

``` php
[[!FileDownload?
&getDir=`assets/files`
&plugins=`[
    {
        "name":"[[++core_path]]components/filedownload/plugins/formit.formsave.plugin.php"
        ,"event":"OnLoad"
        ,"strict":true
    },{
        "name":"[[++core_path]]components/filedownload/plugins/formit.formsave.plugin.php"
        ,"event":"AfterFileDownload"
    },{
        "name":"FileDownloadEmailPlugin"
        ,"event":"AfterFileDownload"
    }
]`
&emailProps=`{
    "emailTpl":"FileDownloadEmailChunk",
    "emailSubject":"New Downloader",
    "emailTo":"your@email.com",
    "emailCC":"your@other.email.com",
    "emailBCC":"your@secret.email.com",
    "emailBCCName":"secret"
}`
]]
```

In this example, I'm using 2 default plugins for examples, **[FormSave](extras/formsave "FormSave")** (as file based) and **Email** (as a snippet), which are both depend on [FormIt](extras/formit "FormIt").
These plugins will do:

- OnLoad
  Checks whether FormSave and Formit are available. If not, halt.
- AfterFileDownload
  After the file is downloaded, store the information into FormSave, and then send email to the given addresses, with the chunk as provided

The email's properties are using the [FormIt](extras/formit "FormIt")'s properties, because it IS the [FormIt](extras/formit "FormIt")'s hook.

The structure of the JSON is:

- **name**
  The snippet's name or file path to the plugin file
- **event**
  Name of the event you want this to be applied
- **strict** _(optional)_
  Boolean (TRUE|FALSE), sets this particular plugin in a strict mode, which means if the return is **FALSE** the script should stop to process. This stopping process is only available on several particular events, so please refer to the Event triggers above.

Multiple plugins and events must be called repeatedly, because they have different strictness statuses.

## APIs

These are the APIs that can be used inside your plugin script:

| Instance      | Method                        | Description                                                               |
| ------------- | ----------------------------- | ------------------------------------------------------------------------- |
| $modx         | all modx's methods            | default MODX instance                                                     |
| $fileDownload | getConfig($key), getConfigs() | gets the scriptProperties, eg the **&emailProps** above                   |
| $plugin       | getProperties()               | gets the custom properties of the plugin                                  |
|               | getAllEvents()                | gets all event triggers                                                   |
|               | getAppliedEvents()            | gets the applied events for the particular plugin in the run-time process |

Now, you can use your imagination to add more features for this snippet.

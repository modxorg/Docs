---
title: "FX2themebase"
_old_id: "1667"
_old_uri: "revo/fx2themebase"
---

## What is FX2?

Hint: it's not the sequel to the 80s action-thriller film :P

Like it's predecessor [FoundationX](extras/foundationx), FX2 is a MODX implementation of Zurb's responsive CSS framework, Foundation.

It provides an easy way for end users of MODX "themes" and "site templates" to customize and configure their sites, with little to no HTML or CSS knowledge. MODX developers and theme authors benefit from a suite of customized tools.

See Live Demo here: <http://fx2.foundationx.net/>

## Requirements

FX2 can be installed via Package Management in MODX Revolution 2.2.8 or later. It is also available as a Snapshot in the MODX Cloud Marketplace. If you don't already have a MODX Cloud account, you can sign up for one [here](https://modxcloud.com/signup/?ref=foundationx).

## History

FoundationX was created in 2012 by YJ Tso (@sepiariver) as a customizable "Super-Theme" for use in MODX Cloud. FX2, a new and vastly modified version, was released October, 2013.

### Current Version

FX2 is currently at version 1.2.1-beta2. It is available as a beta release but it's still a work in progress. Feedback is welcome–actually encouraged. Documentation is on-going.

## Installation

**WARNING: The current version of FX2 replaces your entire site when installed.**

### Installation via Package Management

You can install FX2 via Package Management like any other MODX Extra. The current version 1.2.1-beta2 does not install the custom dashboard. To fix this:

1. Create a new dashboard widget of type "Inline PHP"
2. Enter this one line and save the widget:

``` php
return $modx->getChunk('fx2.dashboard');
```

1. Add the widget to the dashboard of your choice
2. Ensure your user groups have this dashboard set as default, to view it.

### Installation in MODX Cloud

In the main menu of the MODX Cloud Dashboard, navigate to "Marketplace", and find the "FX2 themebase" public snapshot. Click on the "Inject Into Cloud" link. If you haven't created the Cloud in which you want to install FX2, you can follow the documentation [here](https://modxcloud.com/userguide/using-modx-cloud/clouds/create-cloud.html) to do so. In the "Inject into Cloud" pop-up window, select the Cloud you wish to overwrite, then click "Inject Into Cloud".

**The FoundationX Snapshot Will Overwrite Your Cloud**
 Ensure that the Cloud you select to Inject the FX2 Snapshot into doesn't contain data you wish to keep. If you're not sure, Backup the Cloud first. Learn how to Backup your Cloud [here](https://modxcloud.com/userguide/using-modx-cloud/backups/create-a-new-backup.html). All it takes is a mouse-click in MODX Cloud!

When the Snapshot has been successfully injected, you'll receive a Notification. Navigate to that Cloud's Edit page, and click on the "View Manager" button. Login with the default credentials, which is FX2onMODX for both user and password. Immediately customize your username.

### Make Sure to Customize Your Username

If you skip this step, anyone can log into your site using the default credentials!

Immediately after logging for the first time, go to the main menu item “Security” » “Manage Users”. Right-click on the FX2onMODX username and select “Update User”

Customize your username, fullname and email address. Then down on the bottom right of the screen, enable the “New Password” options. Select your options and save your user profile. You can now login with your own username and password, and the "Forgot Login" feature will send password reset info to your email address.

---
title: "Installation"
_old_id: "896"
_old_uri: "revo/handyman/handyman.installation"
---

HandyMan 0.9.0 does **not** support MODX Revolution 2.0.8 or lower - limited support for 2.0.8 is available in 1.0.x, but can be phased out in any of the future versions so don't lurk around on Revo 2.0!

The HandyMan package creates a folder in the root of the site called "HandyMan". If your server is running SuPHP or phpsuexec you will have no problems there, however if you don't you may get errors in the install log. If so, add a folder called "handyman" to the root of your website and give it appropriate permissions for the install (often 777). Then run the HandyMan installer, and make sure to set the folder permissions back to 755.

## MODX.com Provider Installation

HandyMan is available from the MODX Packages installer at <http://www.modx.com/extras/package/handyman> or within your manager. Simply download the package through the Package Manager and follow the installation steps. If you downloaded the package and uploaded it to core/packages manually, you will need to go to "add packages" -> "Search locally for packages" to add it to the workspace.

Depending on your server configuration you will need to create a "handyman" folder in the root of your website, and give it proper write permissions for MODX to write to. If you get errors during the installation that it can not copy to that folder, create it manually and give it the right permission (usually 777 in that case) and re-install the package. During updates you may need to repeat that process as well. An alternative approach has to prevent this inconvenience on such hosts has been suggested and will likely be implemented in an upcoming (1.1/1.2 or so) version.

**After installation you can start using HandyMan at yoursite.com/handyman/.**

## Beta Provider Installation

The Beta Provider has been discontinued. Please use the official MODX.com repository for downloading and installing HandyMan. Thanks!

## Installation (Building) from Git

Clone the repo at <https://github.com/Mark-H/HandyMan> to your local host.

 ``` php
git clone https://github.com/Mark-H/HandyMan.git
```

Add or adjust the core.config.php file to make sure it points to your MODX installation.

Run the \_build/build.transport.php file through the browser or using the php command on the terminal.

Open Package Management in the manager you pointed the config file to and choose to Add Packages and then Search Locally. HandyMan will be added to the grid.

If you don't want to build a package but instead keep it separated, for example to contribute to the code, add handyman.core\_path (pointing to core/components/handyman/), handyman.path (pointing to /handyman/) and handyman.url (pointing to /handyman/). If you want to adjust the theme or templates used set handyman.templates and handyman.theme as well.

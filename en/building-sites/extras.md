---
title: "Installing Extras (Add-ons)"
_old_id: "167"
_old_uri: "2.x/administering-your-site/installing-a-package"
note: "This page is the result of different pages getting combined, which needs some manual work to rewrite into one."
---

## Installing a Package

This page will guide you through the process of installing a Package via [Package Management](extending-modx/transport-packages "Package Management").

Downloading packages through [Package Management](extending-modx/transport-packages "Package Management") requires cURL or PHP Sockets. MODx will let you know if you don't have either of these. If you are still having problems with Package Management after confirming these are installed, see [Troubleshooting Package Management](building-sites/extras/troubleshooting "Troubleshooting Package Management").

Go to Extras -> [Installer](extending-modx/transport-packages "Package Management").

![](/download/attachments/23c66e1935073aec60f9d9ea342a5b6b/modx-package-management-1.jpg)

Then click the Download Extras button.

![](/download/attachments/23c66e1935073aec60f9d9ea342a5b6b/modx-package-management-2.jpg)

Browse the available packages, opening the folders to expose the individual packages. Click Download to download whichever packages you'd like to download. You may download multiple packages at one time.

![](/download/attachments/23c66e1935073aec60f9d9ea342a5b6b/modx-package-management-3.jpg)

The package will be downloaded to the proper directories in your MODx installation. Now you can view your new package, and click Install to choose to install it.

![](/download/attachments/23c66e1935073aec60f9d9ea342a5b6b/modx-package-management-4.jpg)

[Providers](developing-in-modx/advanced-development/package-management/providers "Providers")

You can select the location from which to download packages, add a new location, or select packages on your local machine. Use the Add New Package link, to the left of the Download Extras link. By default, the modxcms.com/extras repository is available as a remote provider.

## Manual Installation

If you prefer, you can manually copy the package into the core/packages directory. The package must be a transport.zip archive, such as wayfinder-2.1.1-beta1.transport.zip. Then, click on 'Add New Package' in the packages grid. From there, select the 'Scan Local' option. The package will now be visible in the Packages list, and you can install it as usual, by right-clicking and selecting Install Package from the pop-up menu.

## Step-by-step

### Downloading Packages

You have a few options: you can download remotely via the Provider option, by selecting the modxcms.com provider from the menu (or just by clicking 'Download Extras' in the grid toolbar).

To download the packages, simply select the package you wish to download and click the "Download" button.

Or, packages can be downloaded directly from a browser via MODX's Extras section, located at <http://modx.com/extras/>. The package zips are loaded simply by uploading them to your core/packages/ directory, and then running the Package Management section of the manager. From there, click on "Add New Package", and select the "Search Locally for Packages" option. MODX will then scan the core package directory, and add any packages you have.

Downloading Packages requires you to either have cURL or sockets installed on your web server. If you do not have these installed, the list of packages will show blank.

The Official Provider of modxcms.com has a URL of: 
<http://rest.modx.com/extras/> 
 and comes packaged in with MODX Revolution 2.0.0.

### Installing Packages

You can easily install packages by right-clicking on the package and clicking "Install". A console will load showing you the details of the package installation.

If the package should have a License Agreement, you'll need to agree to it before you can proceed. Also, the package might provide a README file for you to purvey before installing.

Finally, the package may or may not have some pre-install options and settings for you to set, such as:

![](/download/attachments/18678070/pkgsetupopt.png?version=1&modificationDate=1247328671000)

The package should then install on your MODx installation.

### Updating Packages

You can easily update any package that has been downloaded from a provider. Simply click the 'Check for Updates' context menu item (after right-clicking on the package), and MODx will load a window showing any newer versions. Should your package be already up-to-date, a message will appear.

You can then select the version you would like to install, and MODx will download the package and start the install process.

Now, if you want to revert back, you'll simply uninstall the package, and click the 'Revert' option, which will revert back to the prior package that was installed.

### Uninstalling Packages

You can click on any package to either remove or uninstall a package. _Removing_ a package removes the zip file entirely from your core/packages directory. Uninstall simply uninstalls it.

Note the three modes when you uninstall a package:

![](/download/attachments/18678070/pkguninstall.png?version=1&modificationDate=1247328671000)


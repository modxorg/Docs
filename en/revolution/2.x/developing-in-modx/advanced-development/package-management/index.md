---
title: "Package Management"
_old_id: "214"
_old_uri: "2.x/developing-in-modx/advanced-development/package-management/"
---

MODX Revolution introduces what are called [Transport Packages](/revolution/2.x/developing-in-modx/advanced-development/package-management/transport-packages "Transport Packages"), which are compiled zips of almost anything - from snippets, components, manager templates, to the core itself.

Revolution also has [Providers](/revolution/2.x/developing-in-modx/advanced-development/package-management/providers "Providers"), which are download locations that allow for downloading packages straight from within the MODx manager itself.

<div>- [Downloading Packages](#PackageManagement-DownloadingPackages)
- [Installing Packages](#PackageManagement-InstallingPackages)
- [Updating Packages](#PackageManagement-UpdatingPackages)
- [Uninstalling Packages](#PackageManagement-UninstallingPackages)
- [See Also](#PackageManagement-SeeAlso)

</div>Downloading Packages
--------------------

You have a few options: you can download remotely via the Provider option, by selecting the modxcms.com provider from the menu (or just by clicking 'Download Extras' in the grid toolbar).

To download the packages, simply select the package you wish to download and click the "Download" button.

Or, packages can be downloaded directly from a browser via MODX's Extras section, located at <http://modx.com/extras/>. The package zips are loaded simply by uploading them to your core/packages/ directory, and then running the Package Management section of the manager. From there, click on "Add New Package", and select the "Search Locally for Packages" option. MODX will then scan the core package directory, and add any packages you have.

<div class="note">Downloading Packages requires you to either have cURL or sockets installed on your web server. If you do not have these installed, the list of packages will show blank.</div><div class="info">The Official Provider of modxcms.com has a URL of:   
<http://rest.modx.com/extras/>   
 and comes packaged in with MODX Revolution 2.0.0.</div>Installing Packages
-------------------

You can easily install packages by right-clicking on the package and clicking "Install". A console will load showing you the details of the package installation.

If the package should have a License Agreement, you'll need to agree to it before you can proceed. Also, the package might provide a README file for you to purvey before installing.

Finally, the package may or may not have some pre-install options and settings for you to set, such as:

![](/download/attachments/18678070/pkgsetupopt.png?version=1&modificationDate=1247328671000)

The package should then install on your MODx installation.

Updating Packages
-----------------

You can easily update any package that has been downloaded from a provider. Simply click the 'Check for Updates' context menu item (after right-clicking on the package), and MODx will load a window showing any newer versions. Should your package be already up-to-date, a message will appear.

You can then select the version you would like to install, and MODx will download the package and start the install process.

Now, if you want to revert back, you'll simply uninstall the package, and click the 'Revert' option, which will revert back to the prior package that was installed.

Uninstalling Packages
---------------------

You can click on any package to either remove or uninstall a package. _Removing_ a package removes the zip file entirely from your core/packages directory. Uninstall simply uninstalls it.

Note the three modes when you uninstall a package:

![](/download/attachments/18678070/pkguninstall.png?version=1&modificationDate=1247328671000)

Each is self-explanatory.

- - - - - -

See Also
--------

[Installing a Package](/revolution/2.x/administering-your-site/installing-a-package "Installing a Package")

1. [Transport Packages](/revolution/2.x/developing-in-modx/advanced-development/package-management/transport-packages)
2. [Providers](/revolution/2.x/developing-in-modx/advanced-development/package-management/providers)
3. [Creating a 3rd Party Component Build Script](/revolution/2.x/developing-in-modx/advanced-development/package-management/creating-a-3rd-party-component-build-script)
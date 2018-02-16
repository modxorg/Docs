---
title: "Installing a Package"
_old_id: "167"
_old_uri: "2.x/administering-your-site/installing-a-package"
---

Installing a Package
--------------------

This page will guide you through the process of installing a Package via [Package Management](developing-in-modx/advanced-development/package-management "Package Management").

<div class="note">Downloading packages through [Package Management](developing-in-modx/advanced-development/package-management "Package Management") requires cURL or PHP Sockets. MODx will let you know if you don't have either of these. If you are still having problems with Package Management after confirming these are installed, see [Troubleshooting Package Management](administering-your-site/installing-a-package/troubleshooting-package-management "Troubleshooting Package Management").</div>Go to Extras -> [Installer](https://rtfm.modx.com/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management").

![](/download/attachments/23c66e1935073aec60f9d9ea342a5b6b/modx-package-management-1.jpg)

Then click the Download Extras button.

![](/download/attachments/23c66e1935073aec60f9d9ea342a5b6b/modx-package-management-2.jpg)

Browse the available packages, opening the folders to expose the individual packages. Click Download to download whichever packages you'd like to download. You may download multiple packages at one time.

![](/download/attachments/23c66e1935073aec60f9d9ea342a5b6b/modx-package-management-3.jpg)

The package will be downloaded to the proper directories in your MODx installation. Now you can view your new package, and click Install to choose to install it.

![](/download/attachments/23c66e1935073aec60f9d9ea342a5b6b/modx-package-management-4.jpg)

[Providers](developing-in-modx/advanced-development/package-management/providers "Providers")

You can select the location from which to download packages, add a new location, or select packages on your local machine. Use the Add New Package link, to the left of the Download Extras link. By default, the modxcms.com/extras repository is available as a remote provider.

### Manual Installation

If you prefer, you can manually copy the package into the core/packages directory. The package must be a transport.zip archive, such as wayfinder-2.1.1-beta1.transport.zip. Then, click on 'Add New Package' in the packages grid. From there, select the 'Scan Local' option. The package will now be visible in the Packages list, and you can install it as usual, by right-clicking and selecting Install Package from the pop-up menu.

See Also
--------

1. [Transport Packages](developing-in-modx/advanced-development/package-management/transport-packages)
2. [Providers](developing-in-modx/advanced-development/package-management/providers)
3. [Creating a 3rd Party Component Build Script](developing-in-modx/advanced-development/package-management/creating-a-3rd-party-component-build-script)
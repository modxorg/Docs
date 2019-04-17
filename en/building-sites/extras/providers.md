---
title: "Providers"
_old_id: "247"
_old_uri: "2.x/developing-in-modx/advanced-development/package-management/providers"
---

## What is a Transport Provider?

Transport Providers in MODx are remote sources that one can download Transport Packages from. Simply by specifying a service URL, you can easily hook into the Transport Provider and grab the latest Transport Packages easily from it.

MODx supports an unlimited number of Transport Providers, and each one can be from any source.

MODx recommends not downloading Transport Packages from providers you cannot verify or do not trust. We recommend the modx.com Official Provider at: <http://rest.modx.com/extras/>

## Usage

To setup a Transport Provider, simply go to the Package Management page, and from there click on the 'Providers' panel heading at the bottom. This will open up a grid of Providers, which you can manage easily.

![](/download/attachments/18678072/providers.png?version=1&modificationDate=1260560781000)

From there, you can click "Add New Provider" to add another, or right-click on any provider to get more options. Providers must be valid JSON files, web-accessible, and in the correct Provider format. Note that the Extras section of modxcms.com is a Provider.

The Service URL is the actual, absolute location of the provider file.

Once you have a provider, you can connect to it by going up to the Packages grid, clicking "Add New Provider", and then select the "Select a Provider" option. This will bring up a dropdown of Provider options: ![](/download/attachments/18678072/selprovider.png?version=1&modificationDate=1260560499000)

Once you've selected your provider, click Next, and the download tree will be populated with the contents of that Provider's payload (ie, data). This will show you a tree of Package Versions you can download:

![](/download/attachments/18678072/pkgdownload.png?version=1&modificationDate=1260560109000)

## Related Pages

1. [Transport Packages](extending-modx/transport-packages)
2. [Providers](building-sites/extras/providers)
3. [Creating a 3rd Party Component Build Script](extending-modx/transport-packages/build-script)

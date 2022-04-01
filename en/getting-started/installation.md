---
title: "Installation"
sortorder: "3"
_old_id: "165"
_old_uri: "2.x/getting-started/installation"
---

This page is for **new installations only**. To upgrade MODX please refer to the [Upgrading MODX](getting-started/maintenance/upgrading "Upgrading MODX") documentation.

Before installing please ensure the server meets the [Server Requirements](getting-started/server-requirements "Server Requirements").

## Downloading MODX

MODX Revolution 3.x can be downloaded either directly from [the MODX site](https://modx.com/download) or via [Git](http://github.com/modxcms).

### From the MODX Site

The quickest way to download MODX Revolution is to download a copy directly from the [MODX Downloads](https://modx.com/download/) page.

Please note that the packages listed on this page are snapshots from Git, our version control software, from the time they were packaged. However, Git will always have the latest up-to-date snapshot of Revolution which may contain various bugfixes and additional new features.

#### "Traditional" vs. "Advanced"

There are two distinct top level versions of MODX, "Advanced" and "Traditional".

- Traditional - These packages are pre-built snapshots from Git. Simply extract the files to your server and follow the [Basic Installation](getting-started/installation/standard "Basic Installation") guide to install MODX. Most users should choose this version.

- Advanced - These packages are slightly less than half the size of the "Traditional" downloads, since the "core" contents are compressed. MODX Setup will try to unpack or "build" this package during install. It's recommended to use of this version if there are plans to move the core, manager or connectors directories. SSH access and a familiarity with making folders writable will be required. Please follow the [Advanced Installation](getting-started/installation/advanced "Advanced Installation") document for this distribution.

### From Git

MODX Revolution is managed on [GitHub](http://github.com/modxcms). Please read the [Git Installation](getting-started/installation/git "Git Installation") document to learn how to use MODX Revolution from Git.

## Installing MODX

MODX comes with multiple distributions for download and installation steps will differ in each distribution. Please select the relevant distribution's installation guide using the links below:

- Traditional Distribution: [Basic Installation](getting-started/installation/standard "Basic Installation")
- Advanced Distribution: [Advanced Installation](getting-started/installation/advanced "Advanced Installation")
- Building from Git: [Git Installation](getting-started/installation/git "Git Installation")

See also the page on [Command Line Installation](getting-started/installation/cli "Command Line Installation").

After finishing installation, if you are still having issues, please read the [Troubleshooting Installation](getting-started/installation/troubleshooting "Troubleshooting Installation") page.

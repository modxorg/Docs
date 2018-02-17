---
title: "Installation"
_old_id: "165"
_old_uri: "2.x/getting-started/installation"
---

This page is for **new installations only**. If you're looking to upgrade, see [Upgrading MODx](administering-your-site/upgrading-modx "Upgrading MODx").

Before starting your installation, you should ensure your server meets the [Server Requirements](getting-started/server-requirements "Server Requirements").

## Downloading MODX

To download MODX Revolution 2.x, you have two options: the MODX Site or via Git:

### From the MODX Site

The quickest way to get your Revolution site up and running is to grab a copy directly from the [MODX Downloads](http://modxcms.com/download/) page. There you will find downloads for MODX Revolution.

It's worth noting that these packages are basically snapshots from Git, our version control software, at the time they were packaged. A lot may have changed since then, including bugfixes and the addition of new features. Note the release date for each package. Git will always have the latest up-to-date snapshot of Revolution.

#### "Traditional" vs. "Advanced"

You have probably noticed that there are a few different _types_ of packages to choose from. Some are labeled as "Advanced," others are just a plain old "modx-2.1.0-xxxx-#.zip". So what do these labels mean?

- Traditional - These packages are pre-built snapshots from Git. You can simply extract the files to your server and follow the [Basic Installation](getting-started/installation/basic-installation "Basic Installation") guide to install MODX. Most users should choose this version.

- Advanced - These packages are slightly less than half the size of the "Traditional" downloads, since the "core" contents are compressed. MODX Setup will try to unpack or "build" this package during install. It's recommended you only use this if you plan to move the core, manager or connectors directories, and you have SSH access and are familiar with making folders writable. Please follow the [Advanced Installation](getting-started/installation/advanced-installation "Advanced Installation") document for this distribution.

### From Git

MODX Revolution is managed on [GitHub](http://github.com/modxcms). Please read the [Git Installation](getting-started/installation/git-installation "Git Installation") document to learn how to use MODX Revolution from Git.

## Installing MODX

MODX comes with multiple distributions for download. Installation steps will differ in each distribution, so please select the distribution's installation guide below:

- Traditional Distribution: [Basic Installation](getting-started/installation/basic-installation "Basic Installation")
- Advanced Distribution: [Advanced Installation](getting-started/installation/advanced-installation "Advanced Installation")
- Building from Git: [Git Installation](getting-started/installation/git-installation "Git Installation")

See also the page on [Command Line Installation](getting-started/installation/command-line-installation "Command Line Installation").

After finishing installation, if you are still having issues, please read the [Troubleshooting Installation](getting-started/installation/troubleshooting-installation "Troubleshooting Installation") page.
---
title: "Upgrading MODX"
_old_id: "321"
_old_uri: "2.x/administering-your-site/upgrading-modx"
---

This document covers the standard process for upgrading an existing MODX Revolution installation (typically within the 3.x line, or from a recent 2.x site after you have planned for 3.0 changes).

- Upgrading **from 2.x to 3.0+**: read [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0) first — namespaces, processors, the fixed core path, and PHP requirements all change.
- Confirm your host meets current [Server Requirements](getting-started/server-requirements). **MODX 3.2+ requires PHP 8.1 or higher** (3.0 originally allowed PHP 7.2+).

## Upgrading MODX Revolution

This document assumes you are upgrading from a standard install. For Git users, please see [Git Installation](getting-started/installation/git "Git Installation").

**The latest MODX Revolution release can be downloaded at** **<https://modx.com/download/>**

Always make sure to backup your files and database before upgrading. Upgrades should go smoothly, but it is **always** a safe and smart practice to backup.

Before starting the upgrade process make sure all your packages are up to date and working on your current version. Outdated extras are a common cause of fatal errors after a core upgrade, which can lock you out of the manager.

Pre-Upgrade Checklist:

- Confirm PHP and database versions meet [Server Requirements](getting-started/server-requirements) for the target release
- Upgrade any packages if needed
- Log out of MODX (use "Flush Sessions and Log Out" from the manager menu)
- Delete the files in your core/cache folder

## Uploading the Files

It is generally best not to use FTP to upload files that have been extracted locally. FTP can miss or corrupt files, which will cause errors in your installation. It is also much slower than using the file manager on the server itself. If your server's file manager does not allow extraction, check in the control panel for an extraction script.

For traditional distribution users, simply upload a copy of the MODX.zip file you wish to upgrade to onto your server, and then extract the files on the server itself into a new folder.

Open the new folder, select all of the extracted files and merge/copy them into your MODX root/install location. You can now remove the MODX.zip file and new extracted folder from the server. Your MODX install/root folder should now contain the newly merged files plus a new "setup" folder.

For the advanced distribution, do the same, but you'll only need to do so for the core/ and setup/ directories. With the advanced, you'll need to make sure the manager and connectors directories and files are writable.

Make sure that you don't overwrite core/config/config.inc.php, and that it's writable. Also, don't overwrite or erase the core/components/ directory.

The trick here is to get an FTP client that supports **directory merging**. You don't want to indiscriminately **overwrite** directories: you want to insert the updated files into place inside the directories. Until a self-extracting update mechanism ships, it is **extremely** handy to have an FTP program that supports directory merging or better yet, use the server's extraction script or function in the file manager as suggested above.

On OS X, you can purchase one of the following:

- [Coda](http://panic.com/coda/)
- [Transmit](http://panic.com/transmit/)

**Do Not Overwrite Directories!**
Make sure your FTP program _merges_ directories and does not overwrite them!

## Beginning Setup

In your browser, navigate to [yourSite.com/setup](http://yourSite.com/setup. ) . Select your language, and follow the install/upgrade process, selecting whichever upgrade you want to perform (normal or database).

Update should be pre-selected for you, however if it is not, make sure to select "Upgrade Normal" so as not to overwrite your existing database. Choosing "New Site" will overwrite your database.

If you are upgrading using the **Advanced** distribution, make sure you have the "Core Package has been manually unpacked" and "Files in-place" checkboxes unchecked, and that the core/, manager/ and connectors/ directories are writable.

If you get errors during setup, please read the [Troubleshooting Installation](getting-started/installation/troubleshooting "Troubleshooting Installation") and the [Troubleshooting Upgrades](getting-started/maintenance/upgrading/troubleshooting "Troubleshooting Upgrades") pages.

## After Setup

Make sure to remove the setup/ directory via the last option after setup has completed so that no one can run setup after you and possibly break your site.

Your config.inc.php file should have CHMOD 644 permission.

It's a good idea to clear your browser cache after upgrading. Browsers often cache JS and CSS, and you want to make sure you're getting the newest files in your browser after the upgrade.

## Version-Specific Changes

For changes relating to specific versions, please see the following pages:

- [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0) (required reading for any 2.x → 3.x move; includes the PHP 7.2 → **8.1 in 3.2** requirement notes)
- [Upgrading to 2.8.2 / 2.8.3](getting-started/maintenance/upgrading/2.8.2) (security-related behavioural changes still relevant before jumping to 3.x)
- Historical 2.x notes: [2.3](getting-started/maintenance/upgrading/2.3), [2.2](getting-started/maintenance/upgrading/2.2), [2.1](getting-started/maintenance/upgrading/2.1), [pre-2.0.5](getting-started/maintenance/upgrading/2.0.5), [2.0.0-rc2](getting-started/maintenance/upgrading/2.0.0-rc2)

## See Also

### Mac OS X Users

If you're copying the extracted folder in Mac OS X, be careful, as OS X will "replace" folders when you drag and drop them over each other. Make sure that you use the "ditto" command from the command line, rather than drag/dropping from Finder, otherwise your core/config/config.inc.php file will be erased. A sample ditto command after you've extracted the zip could be:

``` bash
ditto modx-3.2.0-pl /www/public_html/modx/
```

The effect is the same if you use the humble **cp** command:

``` bash
cp -fr modx-3.2.0-pl/* /www/public_html/modx
```

The "-fr" bit forces a recursive copy (i.e. a directory merge). Using a backslash before the "cp" command lets you avoid all the prompts asking "Are you sure?" to every overwrite operation.

See the note above about FTP clients that support directory merging.

### Related Articles

1. [Troubleshooting Upgrades](getting-started/maintenance/upgrading/troubleshooting)
2. [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0)
3. [Server Requirements](getting-started/server-requirements)
4. [Upgrading to 2.8.2 / 2.8.3](getting-started/maintenance/upgrading/2.8.2)

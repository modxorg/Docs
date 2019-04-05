---
title: "Upgrading MODX"
_old_id: "321"
_old_uri: "2.x/administering-your-site/upgrading-modx"
---

This document is for Upgrading MODX 2.x. If you are looking to upgrade from Evolution (1.x), this is not officially supported at this time, but resources to help you in this process can be [found here](display/revolution20/Upgrading+from+MODX+Evolution). 

## Upgrading MODX Revolution 2.x

This document assumes you are upgrading from a standard install. For Git users, please see [Git Installation](getting-started/installation/git "Git Installation").

**The latest MODX Revolution release can be downloaded at** **<http://modx.com/download/>**

Always make sure to backup your files and database before upgrading. Upgrades should go smoothly, but it is **always** a safe and smart practice to backup. 

When you are updating from MODX Revolution 2.0.x to 2.1.x it is VERY important to realize a lot of functions have been deprecated. Most addons will have been updated to use the new methods, however you may not always be running the latest version. So, BEFORE starting the upgrade process make sure all your packages are up to date, and working properly in 2.0.x. If you don't, you may end up being locked in some kind of limbo where the manager can not be accessed due to fatal PHP errors. While this can often be fixed by manually removing or updating the offending files, in certain server setups you may not have access to php generated files (such as files created by the package manager on install) requiring a lot more work to fix. 

Pre-Upgrade Checklist:

- Upgrade any packages if needed
- Log out of MODX (use "Flush Sessions and Log Out" from the manager menu)
- Delete the files in your core/cache folder

## Uploading the Files

It is generally best not to use FTP to upload files that have been extracted locally. FTP can miss or corrupt files, which will cause errors in your installation. It is also much slower than using the file manager on the server itself. If your server's file manager does not allow extraction, check in the control panel for an extraction script. 

For traditional distribution users, simply upload a copy of the MODX.zip file you wish to upgrade to onto your server, and then extract the files on the server itself into a new folder.

Open the new folder, select all of the extracted files and merge/copy them into your MODX root/install location. You can now remove the MODX.zip file and new extracted folder from the server. Your MODX install/root folder should now contain the newly merged files plus a new "setup" folder.

For the advanced distribution, do the same, but you'll only need to do so for the core/ and setup/ directories. With the advanced, you'll need to make sure the manager and connectors directories and files are writable.

Make sure that you don't overwrite core/config/config.inc.php, and that it's writable. Also, don't overwrite or erase the core/components/ directory. 

The trick here is to get an FTP client that supports **directory merging**. You don't want to indiscriminately **overwrite** directories: you want to insert the updated files into place inside the directories. A self-extracting MODX update mechanism is still a couple releases away, so until then, it is **extremely** handy to have an FTP program that supports directory merging or better yet, use the server's extraction script or function in the file manager as suggested above.

On OS X, you can purchase one of the following:

- [Coda](http://panic.com/coda/)
- [Transmit](http://panic.com/transmit/)

**Do Not Overwrite Directories!** 
Make sure your FTP program _merges_ directories and does not overwrite them! 

- - - - - -

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

- [For Upgrading to 2.2](administering-your-site/upgrading-modx/upgrading-to-2.2.x "Upgrading to 2.2.x")
- [For Upgrading From 2.0.x to 2.1.x](administering-your-site/upgrading-modx/upgrading-from-2.0.x-to-2.1.x "Upgrading from 2.0.x to 2.1.x") **!important**
- [For Upgrades Coming From Prior to 2.0.5](administering-your-site/upgrading-modx/upgrading-from-versions-earlier-than-2.0.5 "Upgrading from Versions Earlier than 2.0.5")
- [For Upgrades Coming From Prior to 2.0.0-rc2](administering-your-site/upgrading-modx/upgrading-to-revolution-2.0.0-rc-2 "Upgrading to Revolution 2.0.0-rc-2")

Upgrades after 2.0.0-rc-2 should run smoothly without issues.

## See Also

### Mac OS X Users

If you're copying the extracted folder in Mac OS X, be careful, as OS X will "replace" folders when you drag and drop them over each other. Make sure that you use the "ditto" command from the command line, rather than drag/dropping from Finder, otherwise your core/config/config.inc.php file will be erased. A sample ditto command after you've extracted the zip could be:

``` php 
ditto modx-2.1.0-pl /www/public_html/modx/
```

The effect is the same if you use the humble **cp** command:

``` php 
cp -fr modx-2.2.0-pl/* /www/public_html/modx
```

The "-fr" bit forces a recursive copy (i.e. a directory merge). Using a backslash before the "cp" command lets you avoid all the prompts asking "Are you sure?" to every overwrite operation.

See the note above about FTP clients that support directory merging.

### Related Articles

1. [Troubleshooting Upgrades](getting-started/maintenance/upgrading/troubleshooting)
2. [Upgrading to 2.2.x](administering-your-site/upgrading-modx/upgrading-to-2.2.x)
3. [Upgrading from 2.0.x to 2.1.x](administering-your-site/upgrading-modx/upgrading-from-2.0.x-to-2.1.x)
4. [Upgrading from Versions Earlier than 2.0.5](administering-your-site/upgrading-modx/upgrading-from-versions-earlier-than-2.0.5)
5. [Upgrading to Revolution 2.0.0-rc-2](administering-your-site/upgrading-modx/upgrading-to-revolution-2.0.0-rc-2)
6. [Upgrading from MODX Evolution](administering-your-site/upgrading-modx/upgrading-from-modx-evolution)
7. [Functional Changes from Evolution](administering-your-site/upgrading-modx/upgrading-from-modx-evolution/functional-changes-from-evolution)

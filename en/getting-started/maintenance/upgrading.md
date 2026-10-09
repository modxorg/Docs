---
title: "Upgrading MODX"
_old_id: "321"
_old_uri: "2.x/administering-your-site/upgrading-modx"
---

- Upgrading **from 2.x to 3.0+**: Setup accepts only **2.6.0 or later**. Read [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0) first. Namespaces, processors, the fixed core path, and PHP requirements all change.
- Confirm your host meets current [Server Requirements](getting-started/server-requirements). **MODX 3.2+ requires PHP 8.1 or higher** (3.0 originally allowed PHP 7.2+). Note that setup's own PHP system test still only fails below 7.4 (see [modxcms/revolution#17039](https://github.com/modxcms/revolution/issues/17039)); treat `composer.json` and Server Requirements as the source of truth.
- Upgrading from Evolution (1.x) is not officially supported; historical notes are in [Upgrading from MODX Evolution](getting-started/maintenance/upgrading/evolution).

## Upgrading MODX Revolution

These steps assume a standard install. For Git users, see [Git Installation](getting-started/installation/git "Git Installation").

**The latest MODX Revolution release can be downloaded at** **<https://modx.com/download/>**

Back up your files and database first: upgrades usually go smoothly, but only a backup helps when one does not. Update every package too: outdated extras commonly cause fatal errors after a core update and can lock you out of the Manager.

Pre-upgrade checklist:

- Confirm PHP and database versions meet [Server Requirements](getting-started/server-requirements) for the target release
- Upgrade any packages if needed
- Log out of MODX: from the user menu (top right) choose **Access → Logout All Users** (permission `flush_sessions`; this also ends every other user's session)
- Delete the files in your `core/cache` folder


## Uploading the files

Do not upload files extracted locally over FTP: FTP can skip or corrupt files and is far slower than the server's own file manager. If that file manager cannot extract archives, look for an extraction script in the control panel.

For the traditional distribution, upload a copy of the MODX.zip file you want to upgrade to, extract it on the server into a new folder, then merge all extracted files into your MODX root. You can now remove the MODX.zip file and the new folder. Your root should contain the merged files plus a new `setup` folder.

For the advanced distribution, do the same, but only for the `core/` and `setup/` directories, and make sure the `manager` and `connectors` directories and files are writable.

Do not overwrite `core/config/config.inc.php`, and keep it writable. Do not overwrite or erase the `core/components/` directory.

The updated files must go *inside* your existing directories, not over them. Use an FTP client that supports **directory merging**, or better, the server's own file manager or extraction script. On OS X: [Coda](http://panic.com/coda/) or [Transmit](http://panic.com/transmit/).

**Do not overwrite directories:** your FTP program must *merge* folders, not replace them.

### On OS X

Finder "replaces" folders when you drag and drop them over each other, which erases `core/config/config.inc.php`. Merge from the command line instead. A sample `ditto` command after you have extracted the zip:

``` bash
ditto modx-3.2.0-pl /www/public_html/modx/
```

The effect is the same with **cp**:

``` bash
cp -fr modx-3.2.0-pl/* /www/public_html/modx
```

The "-fr" bit forces a recursive copy (a directory merge). A backslash before `cp` avoids the "Are you sure?" prompts on every overwrite.

## Beginning setup

Open [yourSite.com/setup](http://yourSite.com/setup/) in your browser, choose your language and follow the install/upgrade wizard.

The upgrade should be pre-selected for you; if it is not, choose "Upgrade Existing Install" so as not to overwrite your existing database. Choosing "New Installation" will overwrite your database. For a database with different connection settings there is also "Advanced Upgrade Install".

If you are upgrading using the **Advanced** distribution, make sure the "Core Package has been manually unpacked" and "Files are already in-place" checkboxes are unchecked, and that the `core/`, `manager/` and `connectors/` directories are writable.

If you get errors during setup, read [Troubleshooting Installation](getting-started/installation/troubleshooting "Troubleshooting Installation") and [Troubleshooting Upgrades](getting-started/maintenance/upgrading/troubleshooting "Troubleshooting Upgrades").


## After setup

Remove the `setup/` directory via the last option after setup has completed, so no one can run setup after you and possibly break your site.

Your `config.inc.php` file should have CHMOD 644 permissions.

Clear your browser cache after upgrading: browsers cache JS and CSS, and you want the newest files to load.


## Version-specific changes

- [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0) (required reading for any 2.6+ to 3.x move; includes the PHP 7.2 to **8.1 in 3.2** requirement notes)
- [Upgrading to 2.8.2 / 2.8.3](getting-started/maintenance/upgrading/2.8.2) (security-related behavioural changes still relevant before jumping to 3.x)
- Historical 2.x notes: [2.3](getting-started/maintenance/upgrading/2.3), [2.2](getting-started/maintenance/upgrading/2.2), [2.1](getting-started/maintenance/upgrading/2.1), [pre-2.0.5](getting-started/maintenance/upgrading/2.0.5), [2.0.0-rc2](getting-started/maintenance/upgrading/2.0.0-rc2)

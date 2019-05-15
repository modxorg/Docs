---
title: "Troubleshooting Upgrades"
_old_id: "491"
_old_uri: "2.x/administering-your-site/upgrading-modx/troubleshooting-upgrades"
---

## Common Problems

 First off, make sure:

- You have eAccelerator disabled during install. eAccelerator can cause problems when doing the heavy lifting during the install process.
- You followed all the directions on the [Upgrading MODX](getting-started/maintenance/upgrading "Upgrading MODX") page.
- You've uploaded all the necessary files for upgrade, making sure to **merge** directories and not _replace_ them.
- Clear your browser cache after upgrading. This will clear up a lot of common JS and CSS related errors.
- Clear the Site Cache after upgrading. Sometimes this doesn't occur for whatever reason during setup/ because of your environment.

### Help! The only option I can choose is "New Installation", but this is an upgrade!

 This occurs when you erase the core/config/config.inc.php file. You'll need to restore it. If you made a backup before upgrading (as is strongly recommended), just copy the file from there to your new core/config/ directory and make it writable.

 If you didn't backup, you can try creating a new core/config/config.inc.php from the template in core/docs/config.inc.tpl, by replacing all the placeholders surrounded by {}, and then making the file writable.

### Setup went well, but my manager isn't fully working.

 Make sure to clear your browser cache. Browsers cache the JS and CSS in the manager to have it load faster, and this often causes issues when upgrading, as the browser persists in using the old files. (Note: this is less of an issue post-2.0.2, as JS files are now prefixed with the version to make them non-cacheable after upgrades.)

### Some manager pages are blank due to 400 Bad Request from manager/min/

 If you've never had problems with min before and you happen to have installed the ACE Extra, make sure the files it refers to in manager/components/ace/ exist.

## Still Problems?

 File a bug here: <http://tracker.modx.com/> and we'll get right to the issue.

## See Also

- [Troubleshooting Installation](getting-started/installation/troubleshooting "Troubleshooting Installation")
- [Additional Troubleshooting](faqs-and-troubleshooting "FAQs & Troubleshooting")
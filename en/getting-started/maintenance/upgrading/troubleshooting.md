---
title: "Troubleshooting Upgrades"
_old_id: "491"
_old_uri: "2.x/administering-your-site/upgrading-modx/troubleshooting-upgrades"
sortorder: 1
---

## Common problems

Check first:

- You followed all the directions on the [Upgrading MODX](getting-started/maintenance/upgrading "Upgrading MODX") page.
- You uploaded all the necessary files for the upgrade, **merging** directories instead of _replacing_ them.
- You cleared your browser cache after upgrading. That clears up most JS and CSS related errors.
- You cleared the site cache after upgrading. Setup does not always do it, depending on your environment.

### Help! The only option I can choose is "New Installation", but this is an upgrade!

This occurs when you erase the `core/config/config.inc.php` file. Restore it: if you made a backup before upgrading, copy the file from there to your `core/config/` directory and make it writable.

Without a backup, create a new `core/config/config.inc.php` from the template in `core/docs/config.inc.tpl`, replace all the placeholders surrounded by `{}`, and make the file writable.

### Setup went well, but my manager isn't fully working

Clear your browser cache: the browser caches manager JS and CSS for speed and keeps using the old files after an upgrade. Since 2.0.2 this is rarer, because manager assets carry a cache-busting query token, `?mv=<adler32 hash of version + uuid>`, that changes after every upgrade.

On MODX 3.x the Manager ships prebuilt asset bundles. There is no `manager/min/` compressor path anymore (removed in 3.0). If a page looks blank after upgrade, clear the browser cache for the manager host and confirm your Extra still loads its own assets under `assets/components/<namespace>/` (its PHP lives in `core/components/<namespace>/`).


## Still problems?

[Get help on the forum](https://community.modx.com) or from a [MODX Professional](https://modx.com/professional/).

## See also

- [Troubleshooting Installation](getting-started/installation/troubleshooting "Troubleshooting Installation")
- [Additional Troubleshooting](getting-started/faqs-and-troubleshooting "FAQs & Troubleshooting")

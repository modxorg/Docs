---
title: "Troubleshooting Package Management"
_old_id: "312"
_old_uri: "2.x/administering-your-site/installing-a-package/troubleshooting-package-management"
---

## Troubleshooting Package Management

This page is dedicated to problems with Package Management, specifically with downloading and installing packages.

Most issues can be resolved by making sure you have cURL installed, and that the core/packages/ directory is writable by PHP.

### archiveTo/extractTo errors

If you've downloaded a package, but are getting 'archiveTo'-related errors or a "Package Not Found" error after downloading, make sure you're running at least Revolution 2.0.1, and then go to System Settings and set the **archive\_with** setting to "Yes", or 1.

This will force MODx to use PCLZip instead of ZipArchive, as your environment most likely has a broken ZipArchive configuration or version that is causing the error:

See these tickets for more information:

- <http://bugs.php.net/bug.php?id=44974> (Closed)
- <http://bugs.php.net/bug.php?id=47023> (Closed)
- <http://bugs.php.net/bug.php?id=43641> (Closed)
- <http://bugs.php.net/bug.php?id=48218> (Open)

### Access Denied Error

If you have HTML5 caching enabled try disabling it and clear your browser cache. (<http://tracker.modx.com/issues/7340>)
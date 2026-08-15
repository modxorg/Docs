---
title: Increased Server Requirements
---

MODX 3.0 raised the minimum PHP version to **PHP 7.2** (previously this was PHP 5.3 for 2.x).

That floor was raised again later: **MODX 3.2 requires PHP 8.1 or higher**. If you are upgrading from 2.x all the way to a current 3.x release, plan for PHP 8.1+ — not only the original 3.0 requirement of 7.2.

It is expected that minimum requirements will more closely follow the [official PHP support dates](https://www.php.net/supported-versions.php) going forward.

Web server and database version requirements are covered on the main [Server Requirements](getting-started/server-requirements) page.

Support for sqlsrv databases has been removed, and will [need to be migrated to MySQL](getting-started/upgrading-to-3.0/sqlsrv).

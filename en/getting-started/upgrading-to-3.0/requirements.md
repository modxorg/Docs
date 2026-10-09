---
title: Increased Server Requirements
---

MODX 3.0 raised the minimum PHP version to **PHP 7.2.5** (previously this was PHP 5.3 for 2.x). Note the patch level: 7.2.0 does not satisfy the requirement.

That floor was raised again later:

| MODX line | Minimum PHP (from `composer.json`) |
| --- | --- |
| 3.0 | 7.2.5 |
| 3.1 | 7.4 |
| 3.2+ | 8.1 |

If you are upgrading from 2.x all the way to a current 3.x release, plan for PHP 8.1+ — not only the original 3.0 requirement of 7.2.5.

> Note: the installer's own PHP check still expects PHP 7.4.0 (recommended 8.0.0), while `composer.json` requires 8.1. On PHP 7.4 the Setup passes but `composer install` fails during the upgrade — run Setup on PHP 8.1+.


Web server and database version requirements are covered on the main [Server Requirements](getting-started/server-requirements) page.

Support for sqlsrv databases has been removed, and will [need to be migrated to MySQL](getting-started/upgrading-to-3.0/sqlsrv).

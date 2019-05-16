---
title: "Server Requirements"
sortorder: "2"
_old_id: "273"
_old_uri: "2.x/getting-started/server-requirements"
---

MODX will run fine on most shared/cloud hosting, as well as VPS and dedicated boxes. MODX is written in PHP, typically uses a MySQL database, and needs a webserver like Apache or nginx to serve web requests. 

| Component | Minimum | Recommended |
| --- | --- | --- |
| PHP | 7.0 | 7.2 or 7.3 |
| Database | MySQL 5.5 | MariaDB 10.1 or MySQL 5.7 |
| Webserver | * | nginx 1.8 or Apache 2.4 |

## PHP 

MODX 3 requires at least PHP 7.0, but 7.2 or 7.3 is recommended.

The following extensions are required by MODX, or are commonly required by extras: `zlib`, `json`, `gd`, `pdo` (specifically `pdo_mysql`), `imagick`, `simplexml`, `curl`, and `mbstring`. These are common extensions, and are usually enabled by default.

A `memory_limit` of at least 64M or higher is recommended. 

## Database

MODX supports different database drivers, including `mysql`, `sqlsrv`, and a third-party `postgres` implementation is available. It is important to note that extras also need to implement different drivers for their custom database tables, which is often only done for `mysql`, making that your best bet. 

The minimum supported MySQL version is 4.1.20, but 5.7 or up is recommended. It is also possible to use clusters like Galera. 

Both MyISAM and InnoDB storage engines are supported, as are utf8 and utf8mb character sets.

The following permissions are required: `SELECT`, `INSERT`, `UPDATE`, `DELETE` for normal operations, `CREATE`, `ALTER`, `INDEX`, `DROP` for installations and upgrades of the core and installable extras, and `CREATE TEMPORARY TABLES` by some third party extras. 

## Web servers

Apache 2.4 or nginx 1.8 are recommended. It's also possible to use lighttpd, IIS, Zeus, Valet, and other web servers. 

## Browser Support for the Manager

To use the back-end interface, the following desktop browsers are supported:

- Internet Explorer 11
- Edge (last 2)
- Chrome (last 2)
- Firefox (last 2)
- Safari (last 2)

Supported mobile/tablet browsers:

- Chrome for Android (last)
- Safari on iOS (last)

The manager might work fine on older or different browsers, but they are not officially supported.

Note that these requirements are only for the manager. What browsers your website supports is up to you!

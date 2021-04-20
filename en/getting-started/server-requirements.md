---
title: "Server Requirements"
sortorder: "2"
_old_id: "273"
_old_uri: "2.x/getting-started/server-requirements"
---

MODX will run fine on most shared/cloud hosting, as well as VPS and dedicated boxes. MODX is written in PHP, typically uses a MySQL database, and needs a webserver like Apache or nginx to serve web requests.

| Component | Minimum            | Recommended                                     |
| --------- | ------------------ | ----------------------------------------------- |
| PHP       | 5.6.x              | 7.2 or higher                                   |
| Database  | Latest MySQL 5.6.x | MariaDB 10.1.x or Percona Server 5.6.x or above |
| Webserver | *                  | Latest NGINX 1.18.x or above or Apache 2.4                         |


## PHP

MODX 2.x requires PHP 5.3.3 or higher, with exceptions for 2.7.0 and 2.7.1 which require php 5.4 (but that's been fixed for 2.7.2)

The following extensions are required by MODX, or are commonly required by extras: `zlib`, `json`, `gd`, `pdo` (specifically `pdo_mysql`), `imagick`, `simplexml`, `curl`, and `mbstring`. These are common extensions, and are usually enabled by default.

A `memory_limit` of at least 64M or higher is recommended.

## Database

MODX supports different database drivers, including `mysql`, `sqlsrv`, and a third-party `postgres` implementation is available. It is important to note that extras also need to implement different drivers for their custom database tables, which is often only done for `mysql`, making that your best bet.

The minimum supported MySQL version is 4.1.20, but 5.6 or up is recommended. It is also possible to use clusters like Galera.

Both MyISAM and InnoDB storage engines are supported, as are utf8 and utf8mb character sets.

The following permissions are required:

- `SELECT`, `INSERT`, `UPDATE`, `DELETE` for normal operations,
- `CREATE`, `ALTER`, `INDEX`, `DROP` for installations and upgrades of the core and installable extras,
- `CREATE TEMPORARY TABLES` by some third party extras.

## Web servers

Apache 2.4 or NGINX 1.18.x are recommended. It's also possible to use lighttpd, IIS, Zeus, Valet, and other web servers.

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

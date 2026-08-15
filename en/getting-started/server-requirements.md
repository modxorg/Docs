---
title: "Server Requirements"
sortorder: "2"
_old_id: "273"
_old_uri: "2.x/getting-started/server-requirements"
---

MODX will run fine on most shared/cloud hosting, as well as VPS and dedicated boxes. MODX is written in PHP, typically uses a MySQL database, and needs a webserver like Apache or nginx to serve web requests.

| Component | Minimum | Recommended |
| --------- | ------- | ----------- |
| PHP | 8.1 | 8.2 or higher |
| Database | Latest MySQL 5.6.x | MariaDB 10.1.x or Percona Server 5.6.x or above |
| Webserver | * | NGINX 1.18 or Apache 2.4 |

## PHP

MODX 3 requires **PHP 8.1 or higher** (`composer.json` on the [3.x branch](https://github.com/modxcms/revolution/blob/3.x/composer.json)). PHP 8.2+ is a good target for new installs.

### Required extensions

These PHP extensions are required by the core (same list as `ext-*` in `composer.json`):

- `curl`
- `dom`
- `fileinfo`
- `gd`
- `json`
- `pdo`
- `simplexml`
- `xml`
- `xmlwriter`
- `zip`
- `zlib`

For a MySQL database you also need the PDO MySQL driver (`pdo_mysql`). Setup checks for it when you choose the MySQL driver.

On many hosts these ship as packages such as `php-xml` (covers `dom`, `simplexml`, `xml`, `xmlwriter`), `php-gd`, `php-curl`, `php-zip`, and `php-mysql` / `php-pdo`.

### Recommended extensions

Composer also *suggests* these. They are not hard requirements for a bare install, but you will want them in practice:

- `mbstring` — needed when `use_multibyte` is enabled, and by many Extras
- `iconv` — built-in alias transliteration
- `imagick` — stronger image processing than `gd` alone
- `intl` — internationalization helpers

A `memory_limit` of at least 64M or higher is recommended.

## Database

MODX supports a `mysql` database and a third-party `postgres` implementation is available. It is important to note that extras also need to implement different drivers for their custom database tables, which is often only done for `mysql`, making that your best bet.

> Note: sqlsrv support is deprecated and [has been removed in 3.0](https://github.com/modxcms/revolution/issues/15540).

The minimum supported MySQL version is 4.1.20, but 5.7 or up is recommended. It is also possible to use clusters like Galera.

> Prior to MODX3, sqlsrv was also supported. [As that was practically unused, support for it has been removed in MODX 3.0.](https://github.com/modxcms/revolution/issues/15540)

Both MyISAM and InnoDB storage engines are supported, as are utf8 and utf8mb character sets. It is recommended to use a utf8mb character set for widest UTF-8 support.

The following permissions are required: `SELECT`, `INSERT`, `UPDATE`, `DELETE` for normal operations, `CREATE`, `ALTER`, `INDEX`, `DROP` for installations and upgrades of the core and installable extras, and `CREATE TEMPORARY TABLES` by some third party extras.

## Web servers

MODX will run on most web servers available today. Apache 2.4+ or nginx 1.18.x are recommended.

In order to use [friendly urls](getting-started/friendly-urls), you may need additional configuration depending on the web server. Instructions are available for [apache](getting-started/friendly-urls/apache), [nginx](getting-started/friendly-urls/nginx) and [lighttpd](getting-started/friendly-urls/lighttpd).

## Browser Support for the Manager

To use the back-end interface, the following desktop browsers are supported:

- Edge (last 2)
- Chrome (last 2)
- Firefox (last 2)
- Safari (last 2)

Supported mobile/tablet browsers:

- Chrome for Android (last)
- Safari on iOS (last)

The manager might work fine on older or different browsers, but they are not officially supported.

Note that these requirements are only for the manager. What browsers your website supports is up to you!

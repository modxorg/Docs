---
title: "Server Requirements"
_old_id: "273"
_old_uri: "2.x/getting-started/server-requirements"
---

### Supported Operating Systems

- Linux x86, x86-64
- Mac OS X
- Windows XP, Server

### Supported Web Servers

- Apache 1.3.x - 2.2.x (uses htaccess for Friendly URLs by default)
- IIS 6.0+
- lighttpd ([Setup and Friendly URL Guide](/revolution/2.x/getting-started/installation/basic-installation/lighttpd-guide "Lighttpd Guide"))
- Zeus
- nginx ([Setup and Friendly URL Guide](/revolution/2.x/getting-started/installation/basic-installation/nginx-server-config "Nginx Server Config"))

### PHP Compatibility

- PHP 5.3.3 and above (prior to MODX 2.4: 5.1.2 and above, excluding 5.1.6 and 5.2.0)
- Required extensions: 
  - zlib
  - JSON (or PECL library)
  - mod\_rewrite (for friendly URLs/.htaccess)
  - GD lib (required for captcha and file browser)
  - PDO, specifically pdo\_mysql (for xPDO)
  - ImageMagick (for thumbnails)
  - SimpleXML
  - cURL (for [Package Management](/revolution/2.x/developing-in-modx/advanced-development/package-management "Package Management"))
- safe\_mode off
- register\_globals off
- magic\_quotes\_gpc off
- php-mbstring on (required on some extras like Gallery)
- PHP memory\_limit 24MB or more, depending on your server

<figure class="code"><figcaption>**PHP Configuration Options** </figcaption>```
<pre class="brush: php">./configure --with-apxs2=/usr/local/bin/apxs --with-mysql --prefix=/usr/local --with-pdo-mysql --with-zlib

``` </figure><figure class="code"><figcaption>**NGINX PHP Configuration Options** </figcaption>```
<pre class="brush: php">./configure --with-mysql --with-pdo-mysql --prefix=/usr/local --with-pdo-mysql --with-zlib

```</figure>### MySQL Database Requirements

- 4.1.20 or newer, with the following permissions: 
  - SELECT, INSERT, UPDATE, DELETE are required for normal operation
  - CREATE, ALTER, INDEX, DROP are required for installation/upgrades and potentially for various add-ons
  - CREATE TEMPORARY TABLES may be used by some 3rd party add-ons
- **excludes version 5.0.51** ([Why not 5.0.51?](/revolution/2.x/getting-started/server-requirements/mysql-5.0.51-issues "MySQL 5.0.51 Issues"))
- MyISAM or InnoDB storage engine

### Supported Browsers (for Backend Manager Interface)

- Google Chrome
- Mozilla Firefox 3.0 and above
- Apple Safari 3.1.2 and above
- Microsoft Internet Explorer 8 and above

<div class="info">This list of supported browsers is ONLY for using the backend manager interface. MODX does not control the site visitor's experience and thus supports whatever browser(s) your site's markup is designed for.</div>
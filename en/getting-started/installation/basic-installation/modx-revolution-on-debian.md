---
title: "MODx Revolution on Debian"
_old_id: "203"
_old_uri: "2.x/getting-started/installation/basic-installation/modx-revolution-on-debian"
---

## MODx Revolution on Debian

Debian packages in old versions of MySQL drivers in, so to get it up-to-date and working with the PDO drivers in MODx Revolution, you'll have to do the following:

1. Update the server MySQL drivers. You can do this manually on debian, or use apt-get.
2. Update the client MySQL drivers. The easiest way to do this is by updating PHP, like so:

``` php 
vi /etc/apt/sources.list (you can choose a different mirror):
   deb http://packages.dotdeb.org stable all
   deb-src http://packages.dotdeb.org stable all
   deb http://php53.dotdeb.org stable all
   deb-src http://php53.dotdeb.org stable all

apt-get update
apt-get upgrade php5

vi /etc/php5/apache2/php.ini
   date.timezone = Europe/Amsterdam

/etc/init.d/apache2 reload
```
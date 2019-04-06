---
title: "MODx Revolution в Debian"
translation: "_legacy/getting-started/modx-revolution-on-debian"
---

# MODx Revolution в Debian

Пакеты Debian имеют старые версии драйверов MySQL, поэтому, чтобы обновить его и работать с драйверами PDO в MODx Revolution, вам нужно будет сделать следующее:

1. Обновите серверные драйверы MySQL. Вы можете сделать это вручную в Debian или использовать `apt-get`.
2. Обновите клиентские драйверы MySQL. Самый простой способ сделать это - обновить PHP следующим образом:

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
---
title: "Требования к серверу"
translation: "2.x/getting-started/server-requirements"
---


### Поддерживаемые операционные системы

- Linux x86, x86-64
- Mac OS X
- Windows XP, Server

### Поддерживаемые веб-серверы

- Apache 1.3.x - 2.4.x (использует htaccess для дружественных URL)
- IIS 6.0+
- lighttpd ([Руководство по настройке дружественных URL](getting-started/installation/basic-installation/lighttpd-guide "Lighttpd Guide"))
- Zeus
- nginx ([Руководство по настройке дружественных URL](getting-started/installation/basic-installation/nginx-server-config "Nginx Server Config"))

### Совместимость с PHP

- PHP 5.3.3 и выше (до MODX 2.4: 5.1.2 и выше, исключая 5.1.6 и 5.2.0)
- Требуемые расширения:
  - zlib
  - JSON (для PECL библиотеки)
  - mod\_rewrite (для дружественных URL/.htaccess)
  - GD lib (требуется для капчи и проверки файлов)
  - PDO, конкретно pdo\_mysql (для xPDO)
  - ImageMagick (для миниатюр)
  - SimpleXML
  - cURL (для [Управление пакетами](developing-in-modx/advanced-development/package-management "Управление пакетами"))
- safe\_mode off
- register\_globals off
- magic\_quotes\_gpc off
- php-mbstring on (требуется для некоторых дополнений, таких как Gallery)
- PHP memory\_limit 24MB или больше, в зависимости от вашего сервера

**Параметры конфигурации PHP** 
``` php 
./configure --with-apxs2=/usr/local/bin/apxs --with-mysql --prefix=/usr/local --with-pdo-mysql --with-zlib
```

**Параметры конфигурации NGINX PHP** 
``` php 
./configure --with-mysql --with-pdo-mysql --prefix=/usr/local --with-pdo-mysql --with-zlib
```

### Требования к базе данных MySQL

- 4.1.20 или новее, со следующими разрешениями:
  - SELECT, INSERT, UPDATE, DELETE необходимы для нормальной работы
  - CREATE, ALTER, INDEX, DROP необходимы для установки / обновления и, возможно, для различных дополнений
  - CREATE TEMPORARY TABLES может использоваться некоторыми сторонними надстройками
- **исключает версию 5.0.51** ([Почему не 5.0.51?](getting-started/server-requirements/mysql-5.0.51-issues "MySQL 5.0.51 Issues"))
- MyISAM или InnoDB механизм хранения

### Поддерживаемые браузеры (для интерфейса Backend Manager)

- Google Chrome
- Mozilla Firefox 3.0 или выше
- Apple Safari 3.1.2 или выше
- Microsoft Internet Explorer 8 или выше

Этот список поддерживаемых браузеров предназначен ТОЛЬКО для использования интерфейса backend manager. MODX не контролирует работу посетителя сайта и, следовательно, поддерживает любые браузеры, для которых предназначена разметка вашего сайта.
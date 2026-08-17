---
title: "StatCache"
description: "Плагин статического кэширования ресурсов MODX Revolution на файловой системе"
translation: "extras/statcache/index"
---

### Плагин статического кэширования для MODX Revolution

Extra statcache состоит из плагина MODX Revolution, который записывает статические представления полностью кэшируемых ресурсов MODX в настраиваемое место на файловой системе. Затем rewrite-движок веб-сервера (или аналог) может отдавать статические файлы первыми, если они существуют. MODX (и PHP) обходятся, что позволяет обслуживать потенциально тысячи запросов в секунду. Минус: динамический контент не отдаётся.

### Требования

- MODX Revolution 2.1.x или новее
- Apache или NGINX

GitHub: <https://github.com/opengeek/statcache>
Issues: <https://github.com/opengeek/statcache/issues>

Установите statcache через Package Manager.

### Конфигурация веб-сервера для nginx

После установки extra и включения плагина StaticCache, который генерирует статические файлы, настройте nginx отдавать их первыми, добавив правила перед стандартными правилами MODX для nginx:

#### MODX в DOCUMENT\_ROOT

``` php
location / {
    try_files /statcache$uri~index.html /statcache$uri $uri $uri/ @modx-rewrite;
}
location @modx-rewrite {
    rewrite ^/(.*)$ /index.php?q=$1 last;
}
```

nginx сначала ищет статическое представление запрошенного ресурса в каталоге statcache/ внутри document root, затем выполняет стандартные проверки MODX. Вариант с ~index.html обрабатывает URI MODX с завершающим /. Плагин записывает их как файлы ~index.html для корректной отдачи веб-сервером.

#### MODX в подкаталоге DOCUMENT\_ROOT

``` php
location /modx {
    try_files /modx/statcache$uri~index.html /modx/statcache$uri $uri $uri/ @modx-rewrite2;
}
location @modx-rewrite2 {
    rewrite ^/(.[^/]*)/(.*)$ /$1/index.php?q=$2 last;
}
```

nginx ищет статическое представление в statcache/ внутри MODX\_BASE\_PATH перед стандартными проверками MODX. Вариант с ~index.html обрабатывает URI с завершающим /.

### Конфигурация веб-сервера для Apache

После установки extra и включения плагина StaticCache добавьте в .htaccess Apache правила перед стандартными правилами MODX:

#### MODX в DOCUMENT\_ROOT

``` php
# If MODX is directly in your DOCUMENT_ROOT,
# add this before your MODX Friendly URLs RewriteCond's and RewriteRule...
RewriteCond %{DOCUMENT_ROOT}/statcache%{REQUEST_URI}/~index.html -f
RewriteRule ^(.*)$ statcache/$1~index.html [L,QSA]

RewriteCond %{DOCUMENT_ROOT}/statcache%{REQUEST_URI} -f
RewriteRule ^(.*)$ statcache/$1 [L,QSA]
```

#### MODX в подкаталоге DOCUMENT\_ROOT

``` php
# If MODX is in a subdirectory of your DOCUMENT_ROOT,
# add this before your MODX Friendly URLs RewriteCond's and RewriteRule...
RewriteCond %{DOCUMENT_ROOT}/modx/statcache%{REQUEST_URI}/~index.html -f
RewriteRule ^(.*)$ modx/statcache/$1~index.html [L,QSA]

RewriteCond %{DOCUMENT_ROOT}/modx/statcache%{REQUEST_URI} -f
RewriteRule ^(.*)$ modx/statcache/$1 [L,QSA]
```

Исключение для POST-запросов и query string, чтобы они шли напрямую в MODX:

``` php
RewriteCond %{REQUEST_METHOD} !=POST
RewriteCond %{QUERY_STRING} !.*=.*
```

Примечание: эти две строки нужны дважды, перед первым и вторым набором правил.

### Устранение неполадок

- Убедитесь, что каталог «statcache» есть в web root и доступен для записи PHP
- Проверьте, что «OnBeforeSaveWebPageCache» и «OnSiteRefresh» отмечены в System Events.

---
title: "Дружественные URL на nginx"
_old_id: "376"
_old_uri: "2.x/getting-started/installation/basic-installation/nginx-server-config"
translation: "getting-started/friendly-urls/nginx"
---

nginx не использует `.htaccess`. Для дружественных URL нужен fallback через `try_files` (или эквивалентную перезапись) на `index.php`, плюс PHP-FPM (или другая настройка FastCGI для PHP).

**MODX Cloud:** пропустите конфигурацию сервера ниже. На вашем сайте nginx для дружественных URL уже настроен. Включите их только в Менеджере ([Использование дружественных URL](getting-started/friendly-urls)).

На других хостах сначала добейтесь работающей перезаписи, затем завершите настройки MODX на той же странице.

## Пример блока server

Подставьте свои `server_name`, `root`, TLS и цель `fastcgi_pass`.

``` nginx
server {
 listen 80;
 listen [:]:80;
 server_name example.com www.example.com;
 return 301 https://example.com$request_uri;
}

server {
 listen 443 ssl http2;
 listen [:]:443 ssl http2;
 server_name example.com www.example.com;

 # ssl_certificate /path/to/fullchain.pem;
 # ssl_certificate_key /path/to/privkey.pem;

 root /var/www/example.com;
 index index.php;
 client_max_body_size 30M;

 location @modx {
 rewrite ^/(.*)$ /index.php?q=$1&$args last;
 }

 location / {
 absolute_redirect off;
 try_files $uri $uri/ @modx;
 }

 location ~ \.php$ {
 try_files $uri =404;
 fastcgi_split_path_info ^(.+\.php)(.*)$;
 fastcgi_pass unix:/run/php/php8.2-fpm.sock;
 fastcgi_index index.php;
 include fastcgi_params;
 fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
 fastcgi_param SERVER_NAME $host;
 fastcgi_ignore_client_abort on;
 }

 location ~ /\.ht {
 deny all;
 }
}
```

## Подключение PHP-FPM

Строка `fastcgi_pass` должна совпадать с тем, как слушает PHP-FPM:

- Unix-сокет (часто на одном хосте), например `unix:/run/php/php8.2-fpm.sock` или `unix:/var/run/php-fpm/www.sock`
- TCP, например `127.0.0.1:9000`

Проверьте директиву `listen` в конфиге пула (часто `/etc/php/*/fpm/pool.d/www.conf`) и используйте то же значение в nginx.

## www и домен без www

В примере HTTP перенаправляется на HTTPS канонического хоста. Если на 443 остаются и `www`, и домен без www, добавьте явный редирект с одного на другой, чтобы сессии и SEO не расходились.

## См. также

- [Использование дружественных URL](getting-started/friendly-urls)
- [Требования к серверу](getting-started/server-requirements)

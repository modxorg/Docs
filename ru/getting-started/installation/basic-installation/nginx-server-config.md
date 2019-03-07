---
title: "Nginx Server Config"
translation: "/getting-started/installation/basic-installation/nginx-server-config"
---

Это пример настройки nginx сервера для установки MODX (требуется php-fpm). Этот пример позволяет использовать дружественные URL MODX.

```
server {
        listen 80;
        server_name example.com www.example.com;
        root /home/sites/example.com;
        index index.php;
        client_max_body_size 30M;
        location / {
                root /home/sites/example.com;
                if (!-e $request_filename) {
                        rewrite ^/(.*)$ /index.php?q=$1 last;
                }
        }
        location ~ \.php$ {
                try_files $uri =404;
                fastcgi_split_path_info ^(.+\.php)(.*)$;
                fastcgi_pass   127.0.0.1:9000;
                fastcgi_index  index.php;
                fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
                include fastcgi_params;
                fastcgi_ignore_client_abort on;
                fastcgi_param  SERVER_NAME $http_host;
        }

        location ~ /\.ht {
                deny  all;
        }
}
```

Подключение FastCGI между nginx и PHP, выраженное в строке `fastcgi\_pass 127.0.0.1:9000;` _**должно быть установлено**_ во что-то вроде `fastcgi\_pass unix:/var/run/php5-fpm.sock;`

Это _**зависит**_ от того, как настроен файл www.conf (обычно расположен в `/etc/php5/fpm/pool.d` ). Как настроить директиву "listen" в _**этом**_ файле: TCP или unix сокет (такой как `/var/run/php5-fpm.sock`)?

Файл nginx конфигурации должен указать _**те же**_ соединения в _**обоих**_ файлах! \[теоретически сокеты unix будут быстрее, но в таком случае оба ресурса должны быть на _**одном**_ хосте. TCP полезен в распределенной среде. \]

Альтернативная конфигурация сервера указана [в этой теме на форуме](http://forums.modx.com/thread/70163/furls-not-working-after-upgrade-2-1-3-pl?page=2#dis-post-394442).

Спасибо за размещение этой конфигурации с поддержкой дружественных URL :)

Вопрос: С **root /home/sites/example.com;** определенном на уровне сервера, необходимо ли снова включить в первый блок `location`? 
В моем понимании, конфигурации nginx наследуются сверху вниз, и поэтому в этом случае их можно удалить.

В некоторых случаях (например в старых версиях nginx) вам нужно закомментировать директиву `fastcgi\_split\_path\_info`.
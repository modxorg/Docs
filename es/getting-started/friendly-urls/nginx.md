---
title: "Configuración del servidor Nginx
"
description: "Reescrituras try_files para URLs amigables y un bloque server de ejemplo para nginx"
_old_id: "376"
_old_uri: "2.x/getting-started/installation/basic-installation/nginx-server-config"
---

nginx no usa `.htaccess`. Las URLs amigables necesitan un fallback `try_files` (o una reescritura equivalente) hacia `index.php`, además de PHP-FPM (u otra configuración FastCGI de PHP).

**MODX Cloud:** salta la configuración del servidor de abajo. Tu sitio ya tiene un nginx funcionando para URLs amigables; solo actívalas en el Manager ([Usando las URLs amigables](getting-started/friendly-urls)).

En otros hosts, haz que la reescritura funcione primero y luego completa los ajustes de MODX en esa misma página.

## Ejemplo de bloque server

Ajusta `server_name`, `root`, TLS y el destino de `fastcgi_pass` para tu host.

``` nginx
server {
    listen 80;
    listen [::]:80;
    server_name example.com www.example.com;
    return 301 https://example.com$request_uri;
}

server {
    # http2 on requiere nginx >= 1.25.1; en versiones anteriores usa: listen 443 ssl http2;
    listen 443 ssl;
    listen [::]:443 ssl;
    http2 on;
    server_name example.com www.example.com;

    # ssl_certificate     /path/to/fullchain.pem;
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

    location ~ ^/(_build|_gitify|_backup|core|config\.core\.php) {
        deny all;
    }
}
```

## Conexión con PHP-FPM

La línea `fastcgi_pass` debe coincidir con cómo está escuchando PHP-FPM:

- Socket Unix (común en un solo host), por ejemplo `unix:/run/php/php8.2-fpm.sock` o `unix:/var/run/php-fpm/www.sock`
- TCP, por ejemplo `127.0.0.1:9000`

Revisa la directiva `listen` en la configuración del pool (a menudo bajo `/etc/php/*/fpm/pool.d/www.conf`) y usa el mismo valor en nginx.

## www vs dominio sin www

El ejemplo envía HTTP al HTTPS del host canónico. Si mantienes tanto `www` como el nombre sin www en el 443, añade una redirección explícita de uno a otro para que las sesiones y el SEO se mantengan consistentes.

## Páginas relacionadas

- [Usando las URLs amigables](getting-started/friendly-urls)
- [Endurecer MODX](getting-started/maintenance/securing-modx)
- [Requerimientos del Servidor](getting-started/server-requirements)

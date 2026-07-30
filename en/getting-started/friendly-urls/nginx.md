---
title: "Friendly URLs on nginx"
_old_id: "376"
_old_uri: "2.x/getting-started/installation/basic-installation/nginx-server-config"
---

nginx does not use `.htaccess`. Friendly URLs need a `try_files` fallback (or equivalent rewrite) to `index.php`, plus PHP-FPM (or another FastCGI PHP setup).

**MODX Cloud:** skip the server config below. Your site already has a working nginx setup for Friendly URLs; just enable them in the Manager ([Using Friendly URLs](getting-started/friendly-urls)).

On other hosts, get rewrites working first, then finish the MODX settings on that same page.

## Example server block

Adjust `server_name`, `root`, TLS, and the `fastcgi_pass` target for your host.

``` nginx
server {
    listen 80;
    listen [::]:80;
    server_name example.com www.example.com;
    return 301 https://example.com$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
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
}
```

## PHP-FPM connection

The `fastcgi_pass` line must match how PHP-FPM is listening:

- Unix socket (common on a single host), for example `unix:/run/php/php8.2-fpm.sock` or `unix:/var/run/php-fpm/www.sock`
- TCP, for example `127.0.0.1:9000`

Check the `listen` directive in the pool config (often under `/etc/php/*/fpm/pool.d/www.conf`) and use the same value in nginx.

## www vs bare domain

The sample sends HTTP to HTTPS on the canonical host. If you keep both `www` and bare names on 443, add an explicit redirect from one to the other so sessions and SEO stay consistent.

## Related

- [Using Friendly URLs](getting-started/friendly-urls)
- [Server Requirements](getting-started/server-requirements)

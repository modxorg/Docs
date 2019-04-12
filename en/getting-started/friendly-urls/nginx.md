---
title: "Nginx Server Config"
_old_id: "376"
_old_uri: "2.x/getting-started/installation/basic-installation/nginx-server-config"
---

Here is an example config for a MODX installation on an nginx server (php-fpm is required for nginx servers). This example enables MODX FURLs as well.

``` php
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

FastCGI connectivity between nginx and PHP as expressed on the line "fastcgi\_pass 127.0.0.1:9000;" _**may need to be set**_ to something like "fastcgi\_pass unix:/var/run/php5-fpm.sock;"

This is _**codependent**_ on how the www.conf (usually located at /etc/php5/fpm/pool.d ) file is configured. How is the "listen" directive set up in _**that**_ file: TCP or unix socket (i.e. /var/run/php5-fpm.sock ) ?

The nginx config file needs to specify the _**same**_ connection in _**both**_ files! \[NB: theoretically unix sockets will be faster, but in such case both resources need to be on the _**same**_ host. TCP is useful in a distributed environment. \]

An alternative server configuration was suggested [in this forum topic](http://forums.modx.com/thread/70163/furls-not-working-after-upgrade-2-1-3-pl?page=2#dis-post-394442).

Thanks for posting this, complete with FURL support :)

Question: With **root /home/sites/example.com;** defined at the server level, is it necessary to include again in the first location block?
 My understanding is that nginx configs are inherited from the top down, and therefore it could be removed in this case...

In some cases (my guts say older versions of nginx) you might need to comment out the fastcgi\_split\_path\_info directive.

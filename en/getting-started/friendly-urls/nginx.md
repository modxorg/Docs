---
title: "Friendly URLs on nginx"
_old_id: "376"
_old_uri: "2.x/getting-started/installation/basic-installation/nginx-server-config"
---

Here is an example config for a MODX installation on an nginx server (php-fpm is required for nginx servers) to enable friendly urls.

``` php
server {
        listen 80;
        server_name example.com www.example.com;
        root /home/sites/example.com;
        index index.php;
        client_max_body_size 30M;
        
        # the MODX part
        location @modx-rewrite {
            rewrite ^/(.*)$ /index.php?q=$1&$args last;
        }
    
        location / {
            absolute_redirect off;
            try_files $uri $uri/ @modx-rewrite;
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

FastCGI connectivity between nginx and PHP as expressed on the line `fastcgi_pass 127.0.0.1:9000;` _**may need to be set**_ to something like `fastcgi_pass unix:/var/run/php5-fpm.sock;`

This is _**codependent**_ on how the www.conf (usually located at `/etc/php5/fpm/pool.d` ) file is configured. How is the "listen" directive set up in _**that**_ file: TCP or unix socket (i.e. `/var/run/php5-fpm.sock` ) ?

The nginx config file needs to specify the _**same**_ connection in _**both**_ files! \[NB: theoretically unix sockets will be faster, but in such case both resources need to be on the _**same**_ host. TCP is useful in a distributed environment. \]

An alternative server configuration was suggested [in this forum topic](http://forums.modx.com/thread/70163/furls-not-working-after-upgrade-2-1-3-pl?page=2#dis-post-394442).

---
title: "Configuración del servidor Nginx
"
_old_id: "376"
_old_uri: "2.x/getting-started/installation/basic-installation/nginx-server-config"
---

Aquí hay una configuración de ejemplo para una instalación de MODX en un servidor nginx (se requiere php-fpm para los servidores nginx). Este ejemplo también habilita MODX FURL.

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

La conectividad FastCGI entre nginx y PHP como se expresa en la línea `fastcgi_pass 127.0.0.1:9000;` _**puede necesitar ser configurada**_ a algo como `fastcgi_pass unix:/var/run/php5-fpm.sock;`

Esto es _**dependiente**_ de cómo se configura el archivo www.conf (generalmente ubicado en `/etc/php5/fpm/pool.d`). ¿Cómo se configura la directiva "listen" en _**ese**_ archivo: TCP o unix socket (por ej. `/var/run/php5-fpm.sock` ) ?

¡El archivo de configuración de nginx necesita especificar la  _**misma**_ conexión en _**ambos**_ archivos! \[Nota: teóricamente, los sockets de Unix serán más rápidos, pero en tal caso ambos recursos deben estar en el _**mismo**_ host . TCP es útil en un entorno distribuido.\]

Se sugiere una configuración de servidor alternativa [en este tema del foro](http://forums.modx.com/thread/70163/furls-not-working-after-upgrade-2-1-3-pl?page=2#dis-post-394442).

Gracias por publicar esto, completo con soporte FURL :)

Pregunta: Con **root /home/sites/example.com;** definido en el nivel del servidor, ¿es necesario incluirlo nuevamente en el primer bloque `location`?  
Tengo entendido que las configuraciones nginx se heredan de arriba hacia abajo y, por lo tanto, podrían eliminarse en este caso ...

En algunos casos (probablemente en versiones anteriores de nginx), es posible que debas comentar la directiva `fastcgi_split_path_info`.

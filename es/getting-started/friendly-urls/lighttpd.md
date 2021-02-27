---
title: "Guía para Lighttpd"
_old_id: "169"
_old_uri: "2.x/getting-started/installation/basic-installation/lighttpd-guide"
---

## Guía para configuración de URLs amigables en Lighttpd

- Esto todavía es un trabajo en progreso, y actualmente solo cubre el aspecto de reescritura de URL.
- Esta guía asume que ya tienes una instalación de lighttpd, mysql y PHP en funcionamiento.
- Esta guía solo cubre la configuración adecuada y el uso de reescritura de URLs amigables.

### Configuración de URLs amigables 

lighttpd no utiliza el mismo sistema, ni siquiera la misma idea que Apache para la reescritura de URL. Toda la reescritura de URL se realiza en el archivo lighttpd.conf

Primero debemos asegurarnos de que el módulo de reescritura de URL esté habilitado.

- Abre tu archivo de configuración lighttpd.conf (en Linux generalmente se encuentra en `/etc/lighttpd/lighttpd.conf`)
- Busca la directiva server.modules.
- Bajo esta directiva, busca una entrada llamada `mod_rewrite`,.
- Por defecto tiene un # delante. Este es un símbolo de comentario. Elimina el # de la línea y guarda el archivo.

A continuación, necesitamos encontrar la ubicación donde colocar el código de URL amigable. Así que busquemos algo que se vea así:

``` php
$SERVER["socket"] == ":80" {
$HTTP["host"] =~ "yourdomainname.com" {
    server.document-root = "/path/to/your/doc/root"
    server.name = "yourservername"
```

Directamente debajo de esto, debes agregar el siguiente código:

``` php
    url.rewrite-once = ( "^/(assets|manager|core|connectors)(.*)$" => "/$1/$2",
           "^/(?!index(?:-ajax)?\.php)(.*)\?(.*)$" => "/index.php?q=$1&$2",
           "^/(?!index(?:-ajax)?\.php)(.*)$" => "/index.php?q=$1"
     )
```

¡Esto no significa que hayas terminado! Lighttpd maneja las reescrituras de URL de manera un poco diferente.

DEBES excluir cualquier archivo o carpeta que no desees reescribir en el archivo de configuración. Los directorios/archivos excluidos en el ejemplo anterior son (assets|manager|core|connectors). Si deseas agregar más a estos, simplemente agrega otro | seguido del nombre de carpeta o el nombre de archivo que deseas omitir de la reescritura de URL.

Una vez hecho esto, tendrás las URL amigables funcionando nuevamente en lighttpd.

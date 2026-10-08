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

Directamente debajo de esto, agrega las siguientes reglas para que los archivos existentes y las rutas `assets`, `manager`, `connectors` y `.well-known` no se reescriban. `core/` se deja fuera a propósito para que sus archivos (por ejemplo `core/docs/changelog.txt`) nunca se sirvan como estáticos: las peticiones caen en MODX y devuelven 404:

``` lighttpd
    url.rewrite-once = (
        "^/(assets|manager|connectors|\.well-known)(.*)$" => "/$1/$2",
        "^/(?!index\.php)(.*)\?(.*)$" => "/index.php?q=$1&$2",
        "^/(?!index\.php)(.*)$" => "/index.php?q=$1"
    )
```

¡Esto no significa que hayas terminado! Lighttpd maneja las reescrituras de URL de manera un poco diferente.

DEBES excluir del rewrite cualquier archivo o carpeta que no desees reescribir: lighttpd solo omite las rutas que listas. En el ejemplo anterior, los directorios/archivos excluidos son (assets|manager|connectors|.well-known). Para proteger otro directorio accesible por web, extiende el primer patrón con `|dirname`, por ejemplo `(assets|manager|connectors|media)`. Añade `|robots\.txt|/favicon\.ico` al mismo patrón si esos archivos viven en la raíz del documento y deben servirse directamente.

Estas reglas apuntan a lighttpd 1.4.x, que hace match sobre el URI completo de la petición, incluida la query string.

Una vez hecho esto, tendrás las URL amigables funcionando nuevamente en lighttpd.

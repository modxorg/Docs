---
title: "Instalación desde línea de comandos"
_old_id: "349"
_old_uri: "2.x/getting-started/installation/command-line-installation"
---

La instalación CLI está disponible solo para MODX Revolution versiones 2.2 y posteriores.

## Instalación de MODX a través de la línea de comandos PHP

MODX permite actualizar e instalar desde la línea de comandos (CLI) con un archivo config XML. (Más información sobre este archivo [aquí](getting-started/installation/cli/config.xml "The Setup Config Xml File").) Así se pueden crear scripts simples para actualizar instalaciones de MODX.

Al ejecutar actualizaciones, se recomienda **siempre** hacer una copia de seguridad de tus archivos antes de actualizar.

## Nuevas instalaciones CLI

En primer lugar, [descargar MODX](https://modx.com/download/) y extraer los archivos a tu servidor. En el directorio setup/, copia el archivo "config.dist.new.xml" y cámbiale el nombre a "config.xml". MODX buscará automáticamente el archivo setup/config.xml durante la instalación. Puedes moverlo fuera del directorio setup/ (y de la raíz web MODX, si lo deseas) y especificar su ubicación con el argumento "--config=/ruta/a/config.xml".

A continuación, edita el archivo XML y establezca la información de la base de datos adecuada, las rutas MODX y otros parámetros de configuración, y luego en el indicador de línea de comandos, vete hasta el directorio setup/ de MODX y escribe:

``` php
php ./index.php --installmode=new
```

MODX procederá a la instalación y, cuando termine, mostrará el tiempo que llevó ejecutar la instalación, así como cualquier error que haya ocurrido (que también se registrará en un archivo de registro de instalación en core/cache/logs/).

Nota: si tu carpeta principal está en una ubicación "no estándar", puedes usar:

``` php
--core_path=/ruta/a/core/
```

Para anular `MODX_CONFIG_KEY` en una sola ejecución (sitios múltiples o mudanzas), pasa `--config_key=mykey`. Setup elimina los caracteres inseguros y define la clave solo para esa ejecución.

## Hacer una actualización básica de MODX a través de CLI

Sigue los mismos pasos que para las nuevas instalaciones, pero esta vez en tu archivo XML necesitas al menos las claves de "config.dist.upgrade.xml":

- inplace
- unpacked
- language
- core\_path
- remove\_setup\_directory

Y cualquier otro atributo que te gustaría cambiar durante la actualización. Hay un archivo xml de actualización de ejemplo llamado "config.dist.upgrade.xml". Luego, una vez que esté listo, vete al directorio setup/ de MODX y escribe:

``` php
php ./index.php --installmode=upgrade
```

Esto actualizará tu instalación de MODX y, cuando termine, mostrará el tiempo que llevó ejecutar la instalación, así como cualquier error que haya ocurrido (que también se registrará en un archivo de registro de instalación en core/cache/logs/).

## Hacer una actualización avanzada de MODX a través de CLI

Sigue los mismos pasos que para la actualización básica, pero esta vez en tu archivo XML necesitas todos los atributos incluidos en el archivo config.dist.upgrade-advanced.xml, ya que todo se puede cambiar en una actualización avanzada.

Luego, una vez que estés listo, vete al directorio setup/ de MODX y escribe:

``` php
php ./index.php --installmode=upgrade-advanced
```

Esto actualizará tu instalación de MODX y, cuando termine, mostrará el tiempo que llevó ejecutar la instalación, así como cualquier error que haya ocurrido (que también se registrará en un archivo de registro de instalación en core/cache/logs/).

## Usando un script de ayuda

Hay un script auxiliar **installmodx.php** disponible en Github: [https://github.com/craftsmancoding/modx\_utils/blob/master/installmodx.php](https://github.com/craftsmancoding/modx_utils/blob/master/installmodx.php)

Proporciona opciones de línea de comandos para este proceso.

## Instalación interactiva desde la línea de comandos

MODX también incluye un asistente interactivo, `setup/cli-install.php`. Te hace las mismas preguntas, escribe `setup/config.xml` y luego ejecuta la instalación:

``` shell
php setup/cli-install.php --mode=new
```

`--mode` acepta `new`, `upgrade` o `advanced`. Cualquier par `--key=value` que reconozca (por ejemplo `--core_path=/ruta/a/core/`, `--language=es`) se usa para precargar las respuestas, y en las actualizaciones se puede cargar un `config.xml` existente.

## Ver también

1. [Instalación básica](getting-started/installation/standard)
2. [Guía de Lighttpd](getting-started/friendly-urls/lighttpd)
3. [Instalación en un servidor que ejecuta ModSecurity](getting-started/installation/troubleshooting/modsecurity)
4. [Configuración del servidor Nginx](getting-started/friendly-urls/nginx)
5. [Instalación avanzada](getting-started/installation/advanced)
6. [Instalación desde Git](getting-started/installation/git)
7. [Instalación desde línea de comandos](getting-started/installation/cli)
8. [El archivo Setup Config Xml](getting-started/installation/cli/config.xml)
9. [Solución de problemas de instalación](getting-started/installation/troubleshooting)
10. [Instalación exitosa, ¿ahora qué debo hacer?](getting-started/getting-started)

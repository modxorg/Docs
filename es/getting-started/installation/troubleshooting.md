---
title: "Solución de problemas de instalación"
_old_id: "311"
_old_uri: "2.x/getting-started/installation/troubleshooting-installation"
---

## Problemas comunes

En primer lugar, asegúrate de que:

- Tienes eAccelerator deshabilitado durante la instalación. eAccelerator puede causar problemas al subir objetos pesados durante el proceso de instalación.
- Seguiste todas las instrucciones [aquí](getting-started/installation  "Instalación") para tu distribución.
- Estas usando al menos PHP 5.1.1+, pero no 5.1.6 o 5.2.0
- Está utilizando MySQL superior a 4.1.20, pero no ninguna iteración de MySQL 5.0.51 (incluida 5.0.51a).
- Borraste el directorio `core/cache/` completamente antes de comenzar la configuración. A veces, los permisos de archivo incorrectos pueden causar problemas.
- Limpiaste la caché y las cookies de tu navegador.

## Mensajes de error PDO

Si recibes mensajes de error relacionados con PDO durante la instalación, antes de continuar con los mensajes de error específicos que se detallan a continuación, confirma que la configuración de PDO esté realizada correctamente. Puedes hacerlo ejecutando este código (reemplaza user/password/database/host con tus datos):

``` php
<?php
/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=testdb;host=localhost';
$user = 'dbuser';
$password = 'dbpass';

try {
  $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
?>
```

Si esto falla, la configuración de tu PDO no es  correcta.

## Errores comunes

Aquí hay algunos problemas comunes que pueden ocurrir durante la instalación y sus soluciones:

### "¡Aparece una pantalla en blanco en lugar de la página de opciones!"

Probablemente hayas copiado `config.inc.tpl` en `config.inc.php`, lo cual es incorrecto. Convierte el archivo config.inc.php en un archivo vacío y escribible.

Si cambiaste el nombre de `config.inc.tpl` a `config.inc.php`, cámbielo  a `config.inc.tpl` y crea un archivo en blanco llamado config.inc.php que se pueda escribir.

### "¡Hice clic en instalar y obtuve una pantalla en blanco!"

Asegúrate de que tu configuración `memory_limit` en php.ini esté establecida en al menos 32M. Para servidores más lentos, es posible que necesites subirlo a 64M.

### "No se puede conectar a la base de datos" en la página de opciones de la base de datos

Una de las causas comunes de este problema es que estés utilizando un puerto no estándar para MySQL. Intenta poner esta sintaxis en el campo de nombre de host (reemplazando los datos con el host y el puerto de tu servidor mysql):

> my.basededatos.com;port=3307

### Warning: PDO::\_\_construct() \[pdo.--construct\]: \[2002\] Argumento no válido (intentando conectarse a través de unix: //) o "Checking database:Could not connect to the mysql server"

Esto significa que tu socket MySQL está configurado incorrectamente. Por lo general, esto se puede solucionar agregando (o actualizando) tu php.ini:

``` php
mysql.default_socket=/path/to/my/mysql.sock
mysqli.default_socket=/path/to/my/mysql.sock
pdo_mysql.default_socket=/path/to/my/mysql.sock
```

### La página de inicio de sesión sigue redirigiéndome a si misma sin error

Esto puede suceder con las antiguas instalaciones beta de Revolution. Para solucionarlo, elimina las  3 configuraciones de sistema siguientes de la tabla `[prefijo]_system_settings` en la base de datos (donde prefijo es el prefijo de tu tabla):

- `session_name`
- `session_cookie_path`
- `session_cookie_domain`

Luego elimina el archivo `core/cache/config.cache.php`.

A menos, por supuesto, que los hayas cambiado explícitamente para algún propósito propio.

### Las cosas a veces no se cargan, la página se descarta, etc. (eAccelerator)

¿Estás ejecutando eAccelerator? En algunas configuraciones de servidor, esto puede causar problemas. Es posible que debas deshabilitarlo. Puedes hacerlo a través de tu php.ini:

``` php
eaccelerator.enable = 0;
eaccelerator.optimizer = 0;
eaccelerator.debug = 0;
```

o en tu .htaccess en el directorio raíz de modx, si tu servidor admite las directivas de servidor `php_flag`:

``` php
php_flag eaccelerator.enable 0
php_flag eaccelerator.optimizer 0
php_flag eaccelerator.debug 0
```

### Rareza general en el Manager (no eAccelerator)

En algunos sistemas, especialmente con alojamiento compartido, puede haber un problema con la configuración del sistema `compress_js` y/o `compress_css`. Vete a Sistema -> Configuración del Sistema y escribe 'compress' (sin las comillas) en el cuadro de búsqueda, en la esquina superior derecha. Apaga las dos configuraciones, luego cierra la sesión, elimina todos los archivos en el directorio `core/cache`, borra la memoria caché y las cookies de tu navegador, y vuelve a iniciar sesión.

Si el Manager está lo suficientemente desordenado que no te deja cambiar la configuración, consulta la nota a continuación sobre cómo cambiar las dos configuraciones de sistema en la tabla `modx_system_settings` de la base de datos con PhpMyAdmin.

### El árbol de recursos / elementos / archivos no aparece

Además, las "fallas" de la página pueden provenir de elementos almacenados en la memoria caché de tu propio navegador, lo que puede provocar que el árbol de recursos / elementos / archivos no aparezca debido a versiones antiguas de JavaScript y otros archivos que se utilizan en el lado del cliente. Esto puede verificarse accediendo al administrador con un navegador que no se utilizó anteriormente para hacerlo.

La solución simple: borra la memoria caché de tu navegador e inicia sesión nuevamente en el Manager .

Una solución más completa:

1. En Gestionar, Limpiar Caché
2. En Gestionar, Vaciar Permisos y Vaciar Todas las Sesiones
3. Esto vaciará todo y cerrará sesión
4. Por último, borra la memoria caché del navegador

### ¡No puedo iniciar sesión en el administrador después de la instalación!

Si está redirigiendo nuevamente a la pantalla de inicio de sesión, intenta configurar esto en tu archivo .htaccess, en la raíz de tu instalación MODX:

``` php
php_value session.auto_start 0
```

### No se pudo conectar con el servidor de la base de datos. Verifique las propiedades de conexión e intente nuevamente. Acceso denegado

Often on shared hosting, if you create a username for your database with an underscore (\_) in it, it will cause problems. Ensure your database username does not contain an underscore, and try again.

### El Manager se muestra como texto sin formato después de la instalación

El administrador MODX carga CSS comprimido y scripts JS. Alguna configuración del servidor. Ver "Errores JS en el Manager debido a Error 4

### TEl Manager se muestra como texto sin formato, faltan partes del Manager o hay errores de JavaScript 400 en el Manager 

Si tu manager de MODX no se carga correctamente debido a errores 400  al intentar cargar código JavaScript comprimido de Google Minify, es probable que se deba a una configuración incorrecta del servidor. Si esto no se puede rectificar en el servidor, puedes deshabilitar manualmente la compresión JS y CSS de la siguiente manera:

1. Entra en la base de datos utilizando PhpMyAdmin y busca la tabla `prefijo_system_settings` (`prefijo` suele ser modx).
2. Busca las filas con valores `compress_js` y `compress_css` en el campo key y establece su valor en 0, y guárdalas.
3. Vacía tu directorio `core/cache/`.
4. Borra la memoria caché y las cookies de tu navegador
5. Inicia sesión en el Manager.

Esto te permitirá usar el Manager sin compresión JS y CSS.

### Faltan partes del Manager, cadenas de idioma indefinidas o hay errores de JavaScript 500 en el Manager

1. Asegúrate de que tu carpeta `Connectors/` tenga permisos 0755

## ¿Aún tienes problemas??

Si todavía tienes problemas, publica tu error y la información del entorno del servidor en [nuestros foros aquí](https://forums.modx.com/index.php/board,378.0.html), e intentaremos y solucionar tu problema lo antes posible.

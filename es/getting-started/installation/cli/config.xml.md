---
title: "El archivo de configuración Config Xml del Setup"
translation: "getting-started/installation/cli/config.xml"
---

## El archivo de configuración XML

La instalación por CLI lee un archivo XML (normalmente `setup/config.xml`). Copia `setup/config.dist.new.xml` de un paquete MODX 3.x, renómbralo a `config.xml` y edita los valores para tu servidor. Puedes mantener el archivo fuera de la raíz web y apuntar a él con `--config=/path/to/config.xml`.

El ejemplo siguiente coincide con [`setup/config.dist.new.xml`](https://github.com/modxcms/revolution/blob/3.x/setup/config.dist.new.xml) en la rama 3.x. Reemplaza las credenciales de la base de datos, la cuenta de administrador, el host y las rutas del sistema antes de ejecutar la instalación.

### Ejemplo mínimo para instalación nueva

```xml
<modx>
    <database_type>mysql</database_type>
    <database_server>localhost</database_server>
    <database>modx_modx</database>
    <database_user>db_username</database_user>
    <database_password>db_password</database_password>
    <database_connection_charset>utf8</database_connection_charset>
    <database_charset>utf8</database_charset>
    <database_collation>utf8_general_ci</database_collation>
    <table_prefix>modx_</table_prefix>
    <https_port>443</https_port>
    <http_host>localhost</http_host>

    <!-- 1 = los archivos ya están en su lugar (checkout de Git o extracción completa antes del setup) -->
    <inplace>0</inplace>

    <!-- 1 = core.transport.zip ya extraído en core/packages/ -->
    <unpacked>0</unpacked>

    <!-- Código de idioma IANA para el idioma por defecto del manager -->
    <language>en</language>

    <cmsadmin>username</cmsadmin>
    <cmspassword>password</cmspassword>
    <cmsadminemail>email@address.com</cmsadminemail>

    <core_path>/www/modx/core/</core_path>

    <context_mgr_path>/www/modx/manager/</context_mgr_path>
    <context_mgr_url>/modx/manager/</context_mgr_url>
    <context_connectors_path>/www/modx/connectors/</context_connectors_path>
    <context_connectors_url>/modx/connectors/</context_connectors_url>
    <context_web_path>/www/modx/</context_web_path>
    <context_web_url>/modx/</context_web_url>

    <remove_setup_directory>1</remove_setup_directory>
</modx>
```

Y desde `setup/`:

```shell
php ./index.php --installmode=new
```

Consulta [Instalación desde línea de comandos](getting-started/installation/cli) para `--config`, actualizaciones y `upgrade-advanced`.

### Ejemplo mínimo de actualización

Para `--installmode=upgrade`, `setup/config.dist.upgrade.xml` solo necesita las siguientes claves (más cualquier otro valor que quieras cambiar):

```xml
<modx>
    <inplace>0</inplace>
    <unpacked>0</unpacked>
    <language>en</language>
    <core_path>/www/modx/core/</core_path>
    <remove_setup_directory>1</remove_setup_directory>
</modx>
```

## Opciones de configuración de la base de datos

| Clave | Descripción | Valor predeterminado |
| --- | ----------- | ------- |
| database\_type | El controlador de base de datos a usar en esta instalación. | mysql |
| database\_server | El hostname donde se encuentra tu servidor de BD. Para usar un puerto, añade `:portnumber` al final. | localhost |
| database | El nombre de la base de datos. | modx\_modx |
| database\_user | El usuario para conectarse a la base de datos. | db\_username |
| database\_password | La contraseña para conectarse a la base de datos. | db\_password |
| database\_connection\_charset | El juego de caracteres de la conexión a la base de datos. | utf8 |
| database\_charset | El juego de caracteres de la base de datos. | utf8 |
| database\_collation | La colación de la base de datos. | utf8\_general\_ci |
| table\_prefix | El prefijo de tablas para todas las tablas MODX. | modx\_ |

## Opciones de configuración de la instalación

| Clave | Descripción | Valor predeterminado |
| --- | ----------- | ------- |
| inplace | Pon `1` si usas MODX desde Git o si extrajiste el paquete completo en el servidor antes de la instalación. | |
| unpacked | Pon `1` si ya extrajiste `core/packages/core.transport.zip`. Acelera la instalación cuando no se puede subir el `time_limit` de PHP. | |
| language | Idioma por defecto del manager. Usa códigos IANA. | |
| cmsadmin | Nombre de usuario de la nueva cuenta de administrador (instalaciones nuevas). | username |
| cmspassword | Contraseña de la nueva cuenta de administrador (instalaciones nuevas). | password |
| cmsadminemail | Correo electrónico de la nueva cuenta de administrador (instalaciones nuevas). | email@address.com |
| remove\_setup\_directory | Si eliminar el directorio `setup/` después de la instalación. | 1 |

## Opciones de configuración de rutas

| Clave | Descripción | Valor predeterminado |
| --- | ----------- | ------- |
| core\_path | Ruta absoluta al directorio `core/`. | |
| context\_mgr\_path | Ruta absoluta al contexto del manager. | |
| context\_mgr\_url | Ruta URL del manager (por ejemplo `/modx/manager/`). | |
| context\_connectors\_path | Ruta absoluta al directorio de conectores. | |
| context\_connectors\_url | Ruta URL de los conectores. | |
| context\_web\_path | Ruta absoluta a la raíz web del contexto `web`. | |
| context\_web\_url | Ruta URL de la raíz del sitio (por ejemplo `/modx/`). | |
| assets\_path | Ruta absoluta a `assets/` (opcional; por defecto queda bajo la ruta web). | |
| assets\_url | Ruta URL de `assets/` (opcional). | |
| processors\_path | Ruta absoluta a los procesadores (opcional; MODX define un valor por defecto). | |

## Otras opciones de configuración

| Clave | Descripción | Valor predeterminado |
| --- | ----------- | ------- |
| https\_port | El puerto de tu servidor para conexiones HTTPS. | 443 |
| http\_host | El host HTTP de tu servidor (hostname, por ejemplo `mysite.com`). | localhost |

**Nota:** la clave de configuración no es una etiqueta XML: pásala en la línea de comandos como `--config_key=mykey` para sobreescribir `MODX_CONFIG_KEY` en una sola ejecución (sitios múltiples o mudanzas). Setup elimina los caracteres inseguros del valor.

## Ver también

1. [Instalación básica](getting-started/installation/standard)
    1. [Guía para Lighttpd](getting-started/friendly-urls/lighttpd)
    2. [Instalación en un servidor con ModSecurity](getting-started/installation/troubleshooting/modsecurity)
    3. [Configuración del servidor Nginx](getting-started/friendly-urls/nginx)
2. [Instalación avanzada](getting-started/installation/advanced)
3. [Instalación desde Git](getting-started/installation/git)
4. [Instalación desde línea de comandos](getting-started/installation/cli)
    1. [El archivo Setup Config Xml](getting-started/installation/cli/config.xml)
5. [Solución de problemas de instalación](getting-started/installation/troubleshooting)
6. [Instalación exitosa, ¿ahora qué debo hacer?](getting-started/getting-started)

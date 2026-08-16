---
title: "URLs amigables en IIS"
sortorder: "3"
translation: "getting-started/friendly-urls/iis"
---

Usa esta guía cuando MODX corre en Microsoft IIS y necesitas URLs amigables (FURL). En Apache usas `ht.access` / `.htaccess`. En IIS usas un archivo `web.config` con el módulo [URL Rewrite](https://www.iis.net/downloads/microsoft/url-rewrite).

El hilo de la comunidad que motivó esta página cubre IIS 8 en Windows Server 2012 R2 y el enrutamiento multiidioma. Las mismas reglas base valen en versiones posteriores de IIS.

## Requisitos

1. Instala el módulo **IIS URL Rewrite** en el servidor si falta. Sin él, IIS ignora las reglas de reescritura en `web.config`.
2. Coloca `web.config` en la **raíz web** junto a `index.php` (al mismo nivel que `assets/`, `manager/` y `connectors/`). No lo pongas bajo `core/`. Desde ahí las reglas no reescriben las peticiones públicas a páginas.
3. Confirma que el sitio o la aplicación IIS apunta a esa raíz web.

## Ejemplo de `web.config`

Crea `web.config` en la raíz web (o fusiona estas reglas en un archivo existente). La regla de Friendly URLs refleja el núcleo del `ht.access` de Revolution en la raíz: envía las rutas desconocidas a `index.php?q=…`.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<configuration>
  <system.webServer>
    <rewrite>
      <rules>
        <!-- Opcional: bloquear internal dummy connection si aparecen en los logs -->
        <rule name="Block internal dummy connection" stopProcessing="true">
          <match url=".*" />
          <conditions>
            <add input="{HTTP_USER_AGENT}" pattern="internal dummy connection" />
          </conditions>
          <action type="CustomResponse" statusCode="403"
            statusReason="Forbidden" statusDescription="Forbidden" />
        </rule>

        <rule name="MODX Friendly URLs" stopProcessing="true">
          <match url="^(.*)$" />
          <conditions logicalGrouping="MatchAll">
            <add input="{REQUEST_FILENAME}" matchType="IsFile" negate="true" />
            <add input="{REQUEST_FILENAME}" matchType="IsDirectory" negate="true" />
          </conditions>
          <action type="Rewrite" url="index.php?q={R:1}" appendQueryString="true" />
        </rule>
      </rules>
    </rewrite>
  </system.webServer>
</configuration>
```

Si MODX vive en un subdirectorio (por ejemplo `/modx`), ajusta el `url` del rewrite para que apunte al `index.php` de esa carpeta, o define la raíz de la aplicación IIS como la raíz web de MODX para poder usar el ejemplo sin cambios.

## Activar Friendly URLs en MODX

Activa las FURL en el Manager **después** de que la regla de rewrite funcione.

1. Abre en el navegador una URL que no sea un archivo real (por ejemplo `/about`) y confirma que IIS la reescribe hacia MODX en lugar de devolver un 404 estático.
2. En **Configuración del sistema**, pon `friendly_urls` en Yes.
3. Vacía la caché del sitio.
4. En tu(s) plantilla(s), define la URL base para que CSS y JS sigan cargando, por ejemplo:

```html
<base href="[[!++site_url]]" />
```

Si activas `friendly_urls` antes de que el rewrite funcione, los enlaces a recursos se ven “bonitos” y los assets se rompen. Arregla el rewrite primero y luego cambia el ajuste.

## Sitios multiidioma

Extras como Babel o XRouting necesitan FURL que ya funcionen. Cuando la regla base de arriba esté operativa, añade las reglas IIS extra que documenten esos extras para prefijos de idioma o dominios. En el caso de la comunidad, el multiidioma en IIS falló hasta tener URL Rewrite y un `web.config` en la raíz.

## Páginas relacionadas

- [Usando las URLs amigables](getting-started/friendly-urls)
- [Instalación avanzada](getting-started/installation/advanced)
- [URLs amigables en nginx](getting-started/friendly-urls/nginx)
- [URLs amigables en lighttpd](getting-started/friendly-urls/lighttpd)

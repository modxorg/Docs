---
title: "Usando las URLs amigables"
sortorder: "5"
description: "Activar URLs amigables SEO en MODX 3"
translation: "getting-started/friendly-urls"
---

Las URLs amigables (FURL) reemplazan direcciones como `index.php?id=42` por rutas legibles basadas en alias de recursos, como `/about/` o `/blog/my-post`.

Necesitas dos cosas:

1. Reglas de reescritura en el servidor web que envíen rutas desconocidas a `index.php`
2. URLs amigables activadas en MODX

## 1. Configura tu servidor web

**MODX Cloud:** las reglas de reescritura ya están — omite este paso.

Otros servidores: elige tu guía:

- [Apache](getting-started/friendly-urls/apache) (la mayoría del hosting compartido; usa `ht.access` → `.htaccess`)
- [IIS](getting-started/friendly-urls/iis) (`web.config` + URL Rewrite)
- [nginx](getting-started/friendly-urls/nginx)
- [lighttpd](getting-started/friendly-urls/lighttpd)

Mientras la reescritura no funcione, activar las URLs amigables en MODX dará 404 en las rutas limpias.

## 2. Activa las URLs amigables en MODX

En el Manager, abre **System Settings** (icono de engranaje, navegación superior).

Filtra por clave `friendly` (o Área: Friendly URL) y establece al menos:

| Ajuste | Clave | Valor típico | Por defecto |
| ------ | ----- | ------------ | ----------- |
| Use Friendly URLs | `friendly_urls` | Sí | No |
| Use Friendly Alias Path | `use_alias_path` | Sí (ruta completa desde los padres) | No |

Opcional: [friendly_urls_strict](building-sites/settings/friendly_urls_strict) devuelve 404 para alias desconocidos en lugar de recurrir al pagetitle.

Con **Use Friendly Alias Path** en No, los recursos se comportan como si estuvieran en la raíz del sitio, ignorando las carpetas padre.

Los recursos contenedor (carpetas) usan el ajuste [container_suffix](building-sites/settings/container_suffix) (por defecto `/`) en lugar de `friendly_url_prefix` / `friendly_url_suffix`, eliminados a favor de los [Content Types](building-sites/resources/content-types). Solo aplica a carpetas cuyo content type es HTML.

Para títulos no latinos, configura la transliteración de alias (`friendly_alias_translit`: `none` (por defecto), `iconv`, `iconv_ascii` o una tabla con nombre): [Transliteración de alias](getting-started/friendly-urls/transliteration).

## 3. Añade un base href en tus Plantillas

Pon esto en el `<head>` de cada Plantilla que sirva HTML:

``` html
<base href="[[!++site_url]]" />
```

Las URL relativas de recursos resuelven así desde la raíz del sitio, incluso en rutas anidadas.

## 4. Borra la caché del sitio

Al guardar estos ajustes MODX reconstruye los URI y recarga la configuración automáticamente. Si el frontend sigue sirviendo enlaces o páginas obsoletas, borra la caché desde el Manager (o elimina `core/cache/`) — también tras editar alias o Plantillas.

## Construyendo enlaces

Prefiere los tag de enlace para que las URL sigan siendo correctas al mover recursos:

``` html
<a href="[[~1]]" title="Some title">Some Page</a>
```

Ver [Recursos](building-sites/resources) para la sintaxis de los tag de enlace.

## Opcional: redirecciones www y HTTPS

Cuando las FURL funcionen, elige un host canónico (`www` o dominio sin www) y HTTP o HTTPS — los nombres de host duplicados causan problemas de sesiones y SEO.

En Apache, el archivo `ht.access` incluye ejemplos de reglas comentados: descomenta el bloque que necesites y reemplaza el dominio. Ver la [guía de Apache](getting-started/friendly-urls/apache).

En nginx, coloca la lógica equivalente `return 301` en los bloques `server` correspondientes.

En IIS, añade reglas de redirección equivalentes en `web.config` (ver la [guía de IIS](getting-started/friendly-urls/iis)).

## Relacionado

- [Transliteración de alias](getting-started/friendly-urls/transliteration)
- [friendly_urls_strict](building-sites/settings/friendly_urls_strict)
- [Requisitos del servidor](getting-started/server-requirements)
- [Content Types](building-sites/resources/content-types)
- [Solución de problemas de instalación](getting-started/installation/troubleshooting)

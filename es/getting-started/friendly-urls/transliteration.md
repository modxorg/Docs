---
title: "Transliteración de alias"
translation: "getting-started/friendly-urls/transliteration"
description: "Cómo MODX convierte títulos no latinos en alias de Friendly URLs"
---

## Qué es la transliteración

Cuando MODX construye el alias de un Resource a partir del pagetitle (o cuando escribes el alias), puede mapear caracteres no ASCII a formas aptas para URL. Eso es transliteración: `Кафе` puede pasar a `kafe`, `Straße` a `Strasse`, según el método elegido.

Sin transliteración, las restricciones de caracteres pueden eliminar letras y dejar alias rotos o vacíos. Con Friendly URLs activos, los alias limpios mantienen URLs legibles.

MODX aplica la transliteración en `modResource::filterPathSegment()` al generar o filtrar segmentos de ruta. El mismo flujo alimenta el campo alias en el manager en tiempo real y el filtro de salida [`filterPathSegment`](building-sites/tag-syntax/output-filters).

## Ajustes implicados

Abre **System Settings**, área **Friendly URL** (busca `friendly_alias`):

| Ajuste | Función |
| ------ | ------- |
| [friendly\_alias\_translit](building-sites/settings/friendly_alias_translit) | Método: `none`, `iconv`, `iconv_ascii` o una tabla con nombre de un extra |
| [friendly\_alias\_translit\_class](building-sites/settings/friendly_alias_translit_class) | Clase de servicio para tablas con nombre (por defecto `translit.modTransliterate`) |
| [friendly\_alias\_translit\_class\_path](building-sites/settings/friendly_alias_translit_class_path) | Ruta desde la que cargar esa clase (por defecto `{core_path}components/`) |
| [automatic\_alias](building-sites/settings/automatic_alias) | Generar el alias desde el pagetitle al guardar si el alias está vacío |

Los filtros relacionados (delimitadores, minúsculas, longitud, restricción de caracteres) se aplican después de la transliteración. Revisa el resto de `friendly_alias_*` en la misma área.

En una instalación estándar, `friendly_alias_translit` vale `none`. En el código, si el ajuste no está definido y existe `iconv`, el respaldo es `iconv`. Define el valor a propósito para que el comportamiento quede claro.

## Integrado: none

Deja `friendly_alias_translit` vacío o pon `none`. No hay mapeo de caracteres. Úsalo si los títulos ya son ASCII o escribes los alias a mano.

## Integrado: iconv

Pon `friendly_alias_translit` en `iconv`. Requiere la extensión PHP `iconv`.

MODX convierte la cadena con `//TRANSLIT//IGNORE` al charset del sitio (`modx_charset`, normalmente UTF-8). La calidad depende de tu build de PHP/iconv y de la locale. Es una opción rápida sin extras, no una tabla por idioma.

### iconv\_ascii

Con `iconv_ascii` la conversión apunta a ASCII (`ASCII//TRANSLIT//IGNORE`). Úsalo si quieres segmentos solo latinos y `iconv` todavía deja caracteres no ASCII.

## Tablas con nombre: el extra Translit

Para tablas lingüísticas predecibles (ruso y otras), instala el paquete [Translit](https://extras.modx.com/package/translit) desde Package Management. Incluye `translit.modTransliterate`, que ya es el nombre de clase por defecto en el core.

Configuración habitual tras instalar:

1. Instala **translit**.
2. `friendly_alias_translit_class` = `translit.modTransliterate` (suele estar así).
3. `friendly_alias_translit_class_path` = `{core_path}components/` (por defecto).
4. `friendly_alias_translit` = nombre de tabla, por ejemplo `russian` (no `iconv`).
5. Activa `automatic_alias` si quieres alias desde el pagetitle.
6. Vacía la caché del sitio.

El valor de `friendly_alias_translit` es el **nombre de la tabla** que carga el servicio (nombre de archivo sin `.php`). Otras tablas o una copia propia (por ejemplo `custom`) funcionan igual.

Otros extras (Translitor, yTranslit, etc.) pueden registrar su propia clase. Sigue su documentación y apunta `friendly_alias_translit_class` / path a su servicio si hace falta.

## Comprobar que funciona

1. Activa [friendly\_urls](building-sites/settings/friendly_urls) y configura el rewrite ([guía de Friendly URLs](getting-started/friendly-urls)).
2. Crea un Resource cuyo pagetitle tenga caracteres no latinos.
3. Guarda (con `automatic_alias` o acepta el alias sugerido).
4. Confirma el campo alias y la URL pública.

Los Resources ya guardados mantienen su alias hasta que lo regeneres. Cambiar el ajuste no reescribe el árbol solo.

## Subida de archivos

En MODX 3.x, [upload\_translit](building-sites/settings/upload_translit) puede transliterar nombres de archivos subidos con las mismas reglas globales. Es independiente de los alias FURL, pero útil en los mismos sitios multilingües.

## Ver también

- [Usando las URLs amigables](getting-started/friendly-urls)
- [friendly\_alias\_translit](building-sites/settings/friendly_alias_translit)
- [friendly\_alias\_translit\_class](building-sites/settings/friendly_alias_translit_class)
- [friendly\_alias\_translit\_class\_path](building-sites/settings/friendly_alias_translit_class_path)
- [upload\_translit](building-sites/settings/upload_translit)
- [Translit en extras.modx.com](https://extras.modx.com/package/translit)

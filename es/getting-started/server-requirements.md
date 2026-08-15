---
title: "Requerimientos del Servidor"
sortorder: "2"
_old_id: "273"
_old_uri: "2.x/getting-started/server-requirements"
---

MODX funcionará bien en la mayoría de los alojamientos compartidos o en la nube, así como en VPS y dedicados. MODX está escrito en PHP, generalmente usa una base de datos MySQL y necesita un servidor web como Apache o nginx para atender las solicitudes web.

| Componente | Mínimo | Recomendado |
| ---------- | ------ | ----------- |
| PHP | 8.1 | 8.2 o superior |
| Base de datos | Última MySQL 5.6.x | MariaDB 10.1.x o Percona Server 5.6.x o superior |
| Servidor web | * | NGINX 1.18 o Apache 2.4 |

## PHP

MODX 3 requiere **PHP 8.1 o superior** (`composer.json` en la [rama 3.x](https://github.com/modxcms/revolution/blob/3.x/composer.json)). Para instalaciones nuevas, PHP 8.2+ es una buena meta.

### Extensiones obligatorias

Estas extensiones PHP las exige el núcleo (la misma lista `ext-*` que en `composer.json`):

- `curl`
- `dom`
- `fileinfo`
- `gd`
- `json`
- `pdo`
- `simplexml`
- `xml`
- `xmlwriter`
- `zip`
- `zlib`

Para MySQL también necesitas el controlador PDO MySQL (`pdo_mysql`). El instalador lo comprueba cuando eliges el controlador MySQL.

En muchos hosts llegan como paquetes como `php-xml` (cubre `dom`, `simplexml`, `xml`, `xmlwriter`), `php-gd`, `php-curl`, `php-zip` y `php-mysql` / `php-pdo`.

### Extensiones recomendadas

Composer también las *sugiere*. No son requisitos duros para una instalación mínima, pero casi siempre las querrás:

- `mbstring` — cuando `use_multibyte` está activo, y en muchos Extras
- `iconv` — transliteración de alias integrada
- `imagick` — procesamiento de imágenes más avanzado que solo `gd`
- `intl` — internacionalización

Se recomienda un `memory_limit` de al menos 64M.

## Base de Datos

MODX admite una base `mysql` y existe una implementación de terceros para `postgres`. Los extras también deben implementar controladores para sus tablas, y a menudo solo lo hacen para `mysql`, así que esa es la opción más segura.

> Nota: el soporte sqlsrv está obsoleto y [se eliminó en 3.0](https://github.com/modxcms/revolution/issues/15540).

La versión mínima admitida de MySQL es 4.1.20, pero se recomienda 5.7 o superior. También es posible usar clusters como Galera.

Se admiten los motores MyISAM e InnoDB, así como los conjuntos de caracteres utf8 y utf8mb. Se recomienda utf8mb para el soporte UTF-8 más amplio.

Se requieren los siguientes permisos:

- `SELECT`, `INSERT`, `UPDATE`, `DELETE` para operaciones normales
- `CREATE`, `ALTER`, `INDEX`, `DROP` para instalaciones y actualizaciones del núcleo y extras
- `CREATE TEMPORARY TABLES` para algunos extras de terceros

## Servidores Web

MODX funciona en la mayoría de los servidores web actuales. Se recomiendan Apache 2.4+ o nginx 1.18.x.

Para usar [friendly urls](getting-started/friendly-urls) puede hacer falta configuración adicional. Hay instrucciones para [apache](getting-started/friendly-urls/apache), [nginx](getting-started/friendly-urls/nginx) y [lighttpd](getting-started/friendly-urls/lighttpd).

## Exploradores soportados por el Administrador

Para el Panel de Administración se soportan estos exploradores de escritorio:

- Edge (últimos 2)
- Chrome (últimos 2)
- Firefox (últimos 2)
- Safari (últimos 2)

Móvil/tablet:

- Chrome para Android (último)
- Safari en iOS (último)

El Administrador puede funcionar en exploradores más antiguos, pero no están soportados oficialmente.

Estos requisitos son solo para el Administrador. Los exploradores de tu sitio web los decides tú.

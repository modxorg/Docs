---
title: "Requerimientos del Servidor"
sortorder: "2"
_old_id: "273"
_old_uri: "2.x/getting-started/server-requirements"
---

MODX funcionará bien en la mayoría de los alojamientos compartidos o en la nube, así como en VPS y dedicados. MODX está escrito en PHP, generalmente usa una base de datos MySQL y necesita un servidor web como Apache o nginx para atender las solicitudes web.

| Componente     | Mínimo             | Recomendado                                     |
| ---------------| ------------------ | ----------------------------------------------- |
| PHP            | 5.6.x              | 7.2 o 7.3                                       |
| Base de datos  | Última MySQL 5.6.x | MariaDB 10.1.x o Percona Server 5.6.x o superior|
| Servidor web   | *                  | NGINX 1.8 o Apache 2.4                          |

## PHP

MODX 2.x requiere PHP 5.3.3 o superior, con excepciones para 2.7.0 y 2.7.1 que requieren php 5.4 (pero eso se ha solucionado para 2.7.2).

MODX requiere las siguientes extensiones, o son comúnmente requeridas por extras: `zlib`,` json`, `gd`,` pdo` (específicamente `pdo_mysql`),` imagick`, `simplexml`,` curl`, y `mbstring`. Estas son extensiones comunes, y generalmente están habilitadas de forma predeterminada.

Se recomienda un límite de memoria  (`memory_limit`) de al menos 64Mb o superior.

## Base de Datos

MODX admite diferentes controladores de bases de datos, incluidos `mysql`,` sqlsrv`, y está disponible una implementación de terceros para `postgres`. Es importante tener en cuenta que los extras también necesitan implementar diferentes controladores para sus tablas de base de datos personalizadas, lo que a menudo solo se hace para `mysql`, por lo que es la mejor opción.


La versión mínima admitida de MySQL es 4.1.20, pero se recomienda 5.6 o superior. También es posible usar clusters como Galera.



Se admiten los motores de almacenamiento MyISAM e InnoDB, al igual que los conjuntos de caracteres utf8 y utf8mb.

Se requieren los siguientes permisos:

- `SELECT`, `INSERT`, `UPDATE`, `DELETE` para operaciones normales,
- `CREATE`, `ALTER`, `INDEX`, `DROP` para instalaciones y actualizaciones del núcleo ("core") y extras instalables,
- `CREATE TEMPORARY TABLES` para algunos extras de terceros.

## Servidores Web

Apache 2.4 o NGINX 1.8 son recomendados. También es posible usar lighttpd, IIS, Zeus, Valet y otros servidores web.

## Exploradores soportados por el Administrador

Para usar la interfaz del Panel de Administración, se soportan los siguientes exploradores:

- Edge (últimos 2)
- Chrome (últimos 2)
- Firefox (últimos 2)
- Safari (últimos 2)

Exploradores para móvil/tablet soportados:

- Chrome para Android (último)
- Safari en iOS (último)

El Administrador puede funcionar bien en navegadores antiguos o diferentes, pero no son soportados oficialmente.

Ten en cuenta que estos requisitos son solo para el Administrador. ¡Los navegadores que admita tu sitio web depende de ti!

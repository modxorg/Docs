---
title: "Server vereisten"
sortorder: "2"
translation: "getting-started/server-requirements"
---

MODX draait prima op de meeste shared/cloud hosting, en ook op VPS en dedicated servers. MODX is geschreven in PHP, gebruikt meestal een MySQL-database, en heeft een webserver als Apache of nginx nodig.

| Component | Minimum | Aanbevolen |
| --------- | ------- | ---------- |
| PHP | 8.1 | 8.2 of hoger |
| Database | MySQL 5.7.x | MySQL 8.0+ / MariaDB 10.6+ / Percona Server 8.0+ |
| Webserver | * | NGINX 1.18 of Apache 2.4 |

## PHP

Huidige MODX 3-releases vereisen **PHP 8.1 of hoger**. PHP 8.2+ wordt aangeraden.

MODX 3.0 vroeg oorspronkelijk PHP 7.2. Het minimum ging naar **PHP 8.1 in MODX 3.2**. Upgraden naar 3.2 of later betekent dus dat je host PHP 8.1+ moet ondersteunen.

De volgende extensies zijn nodig voor MODX, of vaak voor extras: `zlib`, `json`, `gd`, `pdo` (met `pdo_mysql`), `imagick`, `simplexml` (`php-xml`), `curl` en `mbstring`. Dit zijn gangbare extensies die meestal standaard aan staan.

Een `memory_limit` van minstens 64M of hoger wordt aangeraden.

## Database

MODX ondersteunt `mysql`. Er bestaat ook een third-party `postgres`-implementatie. Extras ondersteunen vaak alleen `mysql`, dus dat is de veiligste keuze.

> Let op: ondersteuning voor sqlsrv is verwijderd in MODX 3.0. Zie de [sqlsrv-migratienotes (EN)](/current/en/getting-started/upgrading-to-3.0/sqlsrv) als je een oudere site van SQL Server af moet.

Minimale MySQL-versie is 5.7; MySQL 8.0+ of MariaDB 10.6+ wordt aangeraden. Clusters zoals Galera kunnen ook.

Zowel MyISAM als InnoDB worden ondersteund, evenals utf8 en utf8mb4. Gebruik bij voorkeur utf8mb4 voor de breedste UTF-8-ondersteuning.

Benodigde rechten: `SELECT`, `INSERT`, `UPDATE`, `DELETE` voor normaal gebruik; `CREATE`, `ALTER`, `INDEX`, `DROP` voor installatie en upgrades van de core en extras; sommige extras vragen ook `CREATE TEMPORARY TABLES`.

## Webservers

Apache 2.4+ of nginx 1.18.x worden aangeraden.

Voor [vriendelijke URLs](aan-de-slag/vriendelijke-urls) kan extra configuratie nodig zijn. Instructies (EN): [Apache](/current/en/getting-started/friendly-urls/apache), [nginx](/current/en/getting-started/friendly-urls/nginx), [lighttpd](/current/en/getting-started/friendly-urls/lighttpd). Een beknopte Apache-uitleg staat ook in het Nederlands: [Vriendelijke URLs op Apache](aan-de-slag/vriendelijke-urls/apache).

## Browserondersteuning voor de Manager

Desktop:

- Edge (laatste 2)
- Chrome (laatste 2)
- Firefox (laatste 2)
- Safari (laatste 2)

Mobiel/tablet:

- Chrome for Android (laatste)
- Safari on iOS (laatste)

De manager kan op oudere of andere browsers werken, maar die zijn niet officieel ondersteund. Deze eisen gelden alleen voor de manager; welke browsers je frontend ondersteunt bepaal je zelf.

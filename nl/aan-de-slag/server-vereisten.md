---
title: "Server vereisten"
translation: "getting-started/server-requirements"
---

MODX werkt prima op de meeste shared/cloud servers, en ook VPS en dedicated servers zijn geen probleem. MODX is geschreven in PHP, gebruikt in de meeste configuraties een MySQL database, en heeft een webserver als Apache of nginx nodig om de web requests te behandelen.

## PHP 

MODX 2.x vereist een PHP versie van tenminste 5.3.3, maar het is aan te raden om minstens versie 7.1 te gebruiken. 7.2 en 7.3 zijn ook ondersteund.
 
In MODX 3.0 zal de minimale ondersteunde versie van PHP verhoogd worden, waarschijnlijk naar 7.1. 

(MODX 2.7.0 en 2.7.1 hebben PHP 5.4 nodig; in 2.7.2 is dat hersteld naar PHP 5.3.3)

De volgende PHP extensies zijn voor MODX, of voor veelgebruikte extras, nodig: `zlib`, `json`, `gd`, `pdo` (met `pdo_mysql`), `imagick`, `simplexml`, `curl`, en `mbstring`. Dit zijn vrij standaard extensies die in de meeste gevallen standaard beschikbaar zijn.

Een `memory_limit` waarde van tenminste 64M of hoger is aan te raden.

## Database

Het is mogelijk om MODX met verschillende database types te gebruiken, waaronder `mysql`, `sqlsrv`, en ook een third-party `postgres` implementatie is beschikbaar. Het is wel belangrijk om te weten dat veel uitbreidingen mogelijk alleen `mysql` ondersteunen, dat is dan ook de meestgebruikte database met MODX.

De minimale MySQL versie is 4.1.20, maar 5.7 of hoger is aan te raden. Ook clusters als Galera en MySQL alternatieven als MariaDB zijn mogelijk. 

Zowel MyISAM en InnoDB storage engines, en utf8 en utf8mb4 karaktersets zijn ondersteund.

Voor normaal gebruik dient de database user `SELECT`, `INSERT`, `UPDATE`, en `DELETE` permissies te hebben, en `CREATE`, `ALTER`, `INDEX` en `DROP` zijn nodig voor het installeren/upgraden van de core en uitbreidingen. Enkele uitbreidingen hebben mogelijk meer permissies nodig.

## Web servers

Apache 2.4 of hoger, or nginx 1.x is aan te raden.

Het is ook mogelijk om lighttpd, IIS, Zeus, Valet en andere webservers te gebruiken. Hiervoor is mogelijk wel meer configuratie nodig om zoekmachinevriendelijke URLs te ondersteunen.

## Browser Support for the Manager

De volgende browsers zijn ondersteund voor het gebruik van de back-end manager voor het beheren van de site:

- Internet Explorer 11
- Edge (laatste 2)
- Chrome (laatste 2)
- Firefox (laatste 2)
- Safari (laatste 2)

Op mobiele/tablet apparaten:

- Chrome for Android (laatste)
- Safari on iOS (laatste)

De manager werkt mogelijk prima op oudere/andere browsers, maar die zijn niet officieel ondersteund. 

Denk erom dat deze vereisten alleen gelden voor de manager. Welke browsers je voor de site wilt ondersteunen hangt helemaal af van wat je daar zelf voor wilt. 

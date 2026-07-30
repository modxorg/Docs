---
title: "Standaard installatie"
sortorder: "1"
translation: "getting-started/installation/standard"
description: "Installeer MODX 3 vanaf het traditional zip-package"
---

Deze handleiding beschrijft een normale nieuwe installatie vanaf de **traditional** zip-download. De meeste sites gebruiken dit pad.

- Bestaande site upgraden? Zie [Upgraden](aan-de-slag/upgraden).
- `manager/` of `connectors/` hernoemen? Gebruik [Advanced Installation (EN)](/current/en/getting-started/installation/advanced).
- Installeren via Git of Composer? Zie [Git (EN)](/current/en/getting-started/installation/git) of [Composer (EN)](/current/en/getting-started/installation/composer).

## 1. Controleer de vereisten

Controleer of je host voldoet aan de [server vereisten](aan-de-slag/server-vereisten). Huidige MODX 3.x (3.2+) heeft **PHP 8.1+** en MySQL/MariaDB nodig.

Je hebt nodig:

- Een webroot (of submap) waar de site komt
- Een MySQL-database en een databasegebruiker met voldoende rechten
- Mogelijkheid om bestanden te uploaden/uitpakken (file manager, SFTP of SSH)

## 2. Download en plaats de bestanden

1. Download het nieuwste **traditional**-package van [modx.com/download](https://modx.com/download/).
2. Upload de zip naar je server.
3. Pak uit **op de server** (hosting file manager of `unzip`). Dat is veiliger en sneller dan duizenden bestanden via FTP uploaden.
4. Zet de uitgepakte bestanden in je webroot (of submap), zodat `index.php`, `core/`, `manager/`, `connectors/` en `setup/` daar staan.
5. Verwijder daarna de zip en eventuele lege wrapper-map.

Installeren in de domeinroot is gebruikelijk voor productie. Een submap is prima om te testen. Speciale gevallen (bestaande HTML/CMS-site, tijdelijke hosting-URL): [Installing alongside an existing site (EN)](/current/en/getting-started/installation/existing-site).

Zorg dat PHP minstens kan schrijven in:

- `core/cache/`
- `core/config/`
- `core/packages/`
- `core/import/`
- `core/export/`

## 3. Maak de database

In de MySQL-tool van je host (phpMyAdmin, control panel, CLI, enz.):

1. Maak een lege database (utf8mb4 is een goede default als de host die aanbiedt).
2. Maak een databasegebruiker en geef die alle rechten op die database. Een beperktere set rechten staat in [server vereisten](aan-de-slag/server-vereisten).
3. Noteer hostname (vaak `localhost`), databasenaam, gebruikersnaam en wachtwoord. Sommige shared hosts prefixen namen (bijvoorbeeld `account_modx`); gebruik de volledige namen die setup verwacht.

## 4. Start setup

Open in je browser `https://jouwsite.example/setup/` om de installatiewizard te starten.

Gebruik je echte domein of lokale URL, inclusief submap als je daarin hebt geïnstalleerd.

### Taal en welkom

Kies je taal en ga door het welkomstscherm.

### Installatie-opties

Voor een nieuwe site laat je **Nieuwe installatie** geselecteerd. Bestands- en maprechten kun je meestal op de defaults laten. Klik **Volgende**.

### Databaseverbinding

Vul in:

- **Database hostname** - meestal `localhost`. Voor een andere poort: `host;port=3307`. Voor een Unix-socket bijvoorbeeld `;unix_socket=/pad/naar/mysql.sock`.
- **Gebruikersnaam** en **wachtwoord**
- **Databasenaam**
- **Tabelprefix** - `modx_` is prima; wijzig alleen als je meerdere MODX-installaties in één database deelt

Klik **Test database server connection and view collations**. Los fouten op vóór je verdergaat (verkeerd wachtwoord, ontbrekende database, of gebruiker zonder rechten zijn de gebruikelijke oorzaken).

### Charset en collation

Gebruik doorgaans `utf8mb4` en `utf8mb4_general_ci` voor brede compatibiliteit. Met plain `utf8` kun je emoji's of bepaalde scripts niet opslaan. Houd charset en collation bij elkaar.

### Beheerder

Maak de hoofdgebruiker voor de Manager:

- Kies liever een andere gebruikersnaam dan `admin`
- Gebruik een sterk wachtwoord
- Gebruik een e-mailadres dat je beheert (setup gebruikt dit ook voor de initiële `emailsender`-instelling)

Klik **Volgende**.

### Pre-installatiechecks en installeren

Setup controleert PHP, extensies en schrijfbare paden. Los fouten op (zie [server vereisten](aan-de-slag/server-vereisten) en [Troubleshooting (EN)](/current/en/getting-started/installation/troubleshooting)), klik daarna **Installeren**.

### Setup verwijderen en inloggen

Vink aan dat de `setup/`-map verwijderd mag worden, en log in op de Manager.

Laat `setup/` alleen staan zolang je die nog nodig hebt. De installer is krachtig; verwijder hem zodra de installatie gelukt is.

## 5. Na de installatie

1. Controleer of je kunt inloggen en de frontend kunt openen.
2. Werk [Succesvolle installatie, wat nu?](aan-de-slag/succesvolle-installatie) door.
3. Schakel [vriendelijke URLs](aan-de-slag/vriendelijke-urls) in wanneer je klaar bent (met de juiste Apache/nginx-regels).
4. Harden de installatie: [Securing MODX (EN)](/current/en/getting-started/maintenance/securing-modx) (blokkeer vooral webtoegang tot `core/`).
5. Installeer Extras via Package Management wanneer nodig: [Transport packages (EN)](/current/en/extending-modx/transport-packages).

Werkt e-mail later niet? Controleer of [emailsender](/current/en/building-sites/settings/emailsender) een geldig adres voor je domein is.

## Als er iets misgaat

- Wit scherm of vastlopende installatie: [Troubleshooting Installation (EN)](/current/en/getting-started/installation/troubleshooting)
- Nog steeds vast? Vraag hulp in de [MODX Community](https://community.modx.com) en vermeld PHP-versie, databasetype/-versie en de exacte setup-fout (check ook `core/cache/logs/error.log` als die bestaat).

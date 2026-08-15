---
title: "Installatie"
sortorder: "3"
translation: "getting-started/installation"
---

Deze sectie is voor **nieuwe installaties**. Een bestaande site upgraden? Zie [Upgraden](aan-de-slag/upgraden).

Controleer eerst of de host voldoet aan de [server vereisten](aan-de-slag/server-vereisten) (PHP **8.1+** voor huidige 3.x-releases).

## Kies een installatiemethode

| Methode | Voor wie | Handleiding |
| ------- | -------- | ----------- |
| Traditional zip | De meeste gebruikers; eenvoudigste pad | [Standaard installatie](aan-de-slag/installatie/standaard) |
| Advanced zip | `manager/` en/of `connectors/` hernoemen tijdens setup | [Advanced Installation (EN)](/current/en/getting-started/installation/advanced) |
| Git | Contributors en bleeding-edge | [Git Installation (EN)](/current/en/getting-started/installation/git) |
| Composer | Developers die `create-project` prefereren | [Composer (EN)](/current/en/getting-started/installation/composer) |
| CLI | Scripted / unattended setup | [Command Line Installation (EN)](/current/en/getting-started/installation/cli) |

Download packages via [modx.com/download](https://modx.com/download/).

### Traditional vs Advanced

- **Traditional** - Volledig package, uitpakken en setup starten. Gebruik dit tenzij je een specifieke reden hebt om iets anders te kiezen.
- **Advanced** - Kleinere download; setup bouwt/uitpakt het core-package en laat je custom locaties voor `manager/` en `connectors/` instellen. De **core-map kan in MODX 3 niet meer verplaatst of hernoemd worden**. Voor hernoemen van manager/connectors heb je SSH (of vergelijkbaar) en schrijfbare parent-directories nodig.

## Speciale situaties

- [Installeren naast een bestaande site (EN)](/current/en/getting-started/installation/existing-site) (submap, oude HTML/CMS, tijdelijke URL)
- [Troubleshooting Installation (EN)](/current/en/getting-started/installation/troubleshooting)
- Na een geslaagde installatie: [Succesvolle installatie, wat nu?](aan-de-slag/succesvolle-installatie)

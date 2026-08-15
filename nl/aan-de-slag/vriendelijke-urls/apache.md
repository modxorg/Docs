---
title: "Vriendelijke URLs op Apache"
translation: "getting-started/friendly-urls/apache"
description: "Friendly URLs op Apache met mod_rewrite"
---

MODX levert een `ht.access`-bestand in de siteroot. Apache negeert dat tot je het hernoemt of kopieert naar `.htaccess`. Je hebt `mod_rewrite` nodig.

Voor de MODX-instellingen (`friendly_urls`, base href, cache): zie [Vriendelijke URLs](aan-de-slag/vriendelijke-urls).

## Minimale regels

Gebruik minstens het volgende in een root-installatie. Deze regels houden Let's Encrypts `.well-known/` bereikbaar, en blokkeren andere dotfiles, verborgen directories (bijvoorbeeld `.git`) en directe toegang tot `core/`:

```apache
RewriteEngine On
RewriteBase /

# Allow .well-known (Let's Encrypt and similar)
RewriteRule "^\.well-known/" - [L]

# Block other dotfiles / hidden directories and core/
RewriteRule "/\.|^\.(?!well-known/)|^core(/|$)" - [F]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]
```

Het meegeleverde `ht.access` bevat ook uitgecommentarieerde HTTPS-/www-redirects. Voor bredere lockdown (`config.core.php`, `_build/` en gerelateerde paden): zie [Securing MODX (EN)](/current/en/getting-started/maintenance/securing-modx).

## Installatie in een submap

Staat MODX in een submap, zet `RewriteBase` op dat pad inclusief trailing slash:

```apache
RewriteBase /subdirectoryName/
```

Dit is vooral vaak nodig bij lokale installaties onder een subfolder.

## Waar `.htaccess` plaatsen

Plaats het in de MODX-siteroot (naast `index.php`, `manager/`, `connectors/`).

Heeft de host al een `.htaccess` in die map, merge voorzichtig: maak een backup en voeg het MODX-rewriteblok toe onder de host-regels, tenzij de host-docs anders voorschrijven.

## Optioneel: forceer www of non-www

Uncomment in `ht.access` slechts één van de www-blokken en pas het voorbeelddomein aan. Voorbeeld dat `www.jouwsite.nl` naar `jouwsite.nl` over HTTPS redirect:

```apache
RewriteCond %{HTTP_HOST} .
RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]
RewriteRule ^(.*)$ https://%1/$1 [R=301,L]
```

## Optioneel: forceer HTTPS

```apache
RewriteCond %{HTTPS} !=on [OR]
RewriteCond %{SERVER_PORT} !^443
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## Optioneel: `/index.php`-duplicaten voorkomen

Zoekmachines behandelen `/`, `/index.php` en vergelijkbare URL's als duplicate content. Een veelgebruikte fix:

```apache
RewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /index\.(php|html|htm)\ HTTP/
RewriteRule ^(.*)index\.(php|html|htm)$ $1 [R=301,L]
```

Maak altijd een werkende backup van `.htaccess` vóór je editeert. Een syntaxfout kan de hele site offline zetten tot je het bestand herstelt.

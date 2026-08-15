---
title: "Wat is MODX?"
sortorder: "1"
translation: "getting-started/what-is-modx"
---

## Wat is MODX?

MODX is een Content Application Platform. Wat dat betekent hangt af van wie je bent:

### Eindgebruiker

MODX laat je content publiceren in de vorm die jij wilt. De backend is volledig aanpasbaar: zo eenvoudig of uitgebreid als je nodig hebt.

Je kunt alles bouwen, van een eenvoudige site of blog tot een volledige webpresentie, en de admin-interface bruikbaar houden. Versleep pagina's om ze te herschikken. Gebruik een WYSIWYG-weergave van Resources. Houd Resources ongepubliceerd tot ze klaar zijn, of plan publicatie op een vast moment.

MODX helpt je content organiseren zoals jij wilt, met sterke ingebouwde SEO. Friendly URLs zijn volledig ondersteund: `mijnsite.nl/mijn/eigen/url.html` is zo eenvoudig als je sitestructuur.

### Designer

Wil je volledige vrijheid met HTML en CSS? Geen zin om bestaande systemen te forceren tot je ontwerp werkt? MODX genereert geen enkele regel HTML voor je; de frontend is aan jou.

Gebruik MODX als CMS met flexibele templating en vrijheid in content delivery. Plaats CSS en afbeeldingen waar je wilt. Daarna geef je development door, of installeer je Extras vanuit de manager.

### Developer

Zoek je de kracht van een framework én contentbeheer met een bruikbare UI voor klanten? MODX Revolution combineert een flexibele, OOP-gebaseerde API met een PDO-powered ORM genaamd [xPDO](/current/en/extending-modx/xpdo), plus een aanpasbare [Sencha](https://www.sencha.com)-UI. Custom properties, internationalisatie, package-distributie, en custom manager pages om hele applicaties binnen MODX te draaien.

## Basisconcepten

### Resources

[Resources](/current/en/building-sites/resources) zijn in feite een pagina-locatie: HTML-content, een bestand, een doorverwijzing, een symlink, of iets anders.

### Templates

[Templates](/current/en/building-sites/elements/templates) zijn het "huis" waarin een Resource leeft. Daarin staan vaak header en footer.

### Template Variables

[Template Variables](/current/en/building-sites/elements/template-variables) (TVs) zijn custom velden op een Template waarmee je dynamische waarden aan een Resource koppelt. Bijvoorbeeld een "tags"-TV. Je kunt onbeperkt TVs per pagina gebruiken.

### Chunks

[Chunks](/current/en/building-sites/elements/chunks) zijn herbruikbare contentblokken. Ze kunnen [Snippets](/current/en/extending-modx/snippets) of andere Elements bevatten.

### Snippets

[Snippets](/current/en/extending-modx/snippets) zijn dynamische PHP die bij het laden van de pagina draait: menu's bouwen, data ophalen, formulieren verwerken, enzovoort.

### Plugins

Plugins haken in op events tijdens het laden van de site of manager: content filteren, redirects beheren, core-gedrag uitbreiden, enzovoort.

### Systeeminstellingen

Systeeminstellingen bieden uitgebreide configuratie. Veel defaults zijn prima, maar sommige (zoals [vriendelijke URLs](aan-de-slag/vriendelijke-urls)) staan standaard uit of kun je verbeteren door één waarde te wijzigen. Ga na installatie naar Systeem > Systeeminstellingen en bekijk vooral het gebied "Site".

## Wat gebeurt er bij een request?

MODX laadt de gevraagde Resource, haalt de bijbehorende Template op, plaatst de content van de Resource in die Template, en parseert daarna de tags in de gecombineerde output. Het resultaat gaat naar de browser.

## Zie ook

- [Server vereisten](aan-de-slag/server-vereisten)
- [Installatie](aan-de-slag/installatie)
- [Glossary (EN)](/current/en/getting-started/glossary)
- [Directory Structure (EN)](/current/en/getting-started/directory-structure)

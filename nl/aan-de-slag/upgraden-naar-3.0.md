---
title: "Upgraden van 2.x naar 3.0"
sortorder: "7"
translation: "getting-started/upgrading-to-3.0"
---

Dit document beschrijft de belangrijkste wijzigingen tussen 2.x en 3.0 die upgrades raken. Het is geen volledige changelog (die staat in de [changelog](https://github.com/modxcms/revolution/blob/3.x/core/docs/changelog.txt)), maar een referentie van (breaking) changes die sites en extras kunnen raken.

[Compatible extras vind je op SiteDash](https://sitedash.app/extras).

## Upgraden naar 3.0

Setup upgrade alleen vanaf **MODX 2.6.0 of nieuwer**. Zit je op 2.5 of ouder, ga dan eerst naar 2.6. Setup stopt met een fout als de huidige versie lager is dan 2.6.0.

Ben je op 2.6+, volg dan het [standaard upgradeproces](aan-de-slag/upgraden). Draai zo mogelijk eerst de nieuwste **2.8**: die logt deprecated API-gebruik naar het MODX-log, zodat je extras en custom code kunt bijwerken vóór 3.0.

Na het upgraden van de core en je extras kun je breaking changes tegenkomen in extras of custom code.

- Belangrijk: upgrades vanaf MODX ouder dan **2.6.0** worden niet ondersteund
- Belangrijk: [de core-map moet in de projectroot staan en kan niet meer hernoemd worden](#core-map)
- Belangrijk: [MODX 3.0 vroeg PHP 7.2; huidige 3.x (3.2+) vraagt PHP 8.1+](#serververeisten)
- Belangrijk: [sqlsrv-ondersteuning is verwijderd](#sqlsrv)
- [Breaking changes](#belangrijkste-breaking-changes), vooral [hernoemde en verplaatste core classes](/current/en/getting-started/upgrading-to-3.0/class-names)
- [Manager-taal is dynamisch (EN)](/current/en/getting-started/upgrading-to-3.0/manager-language)
- [Systeeminstellingen gewijzigd of verwijderd (EN)](/current/en/getting-started/upgrading-to-3.0/system-settings)
- [Opvallende manager-UI in 3.0 (EN)](/current/en/getting-started/upgrading-to-3.0/manager-ui)
- Custom resource types die core Resource-processors uitbreiden: [Processors (EN)](/current/en/getting-started/upgrading-to-3.0/processors)

Uitgebreide details per onderwerp staan in de [Engelstalige upgrade-sectie](/current/en/getting-started/upgrading-to-3.0).

## Serververeisten

MODX 3.0 verhoogde het minimum naar **PHP 7.2** (2.x vroeg PHP 5.3).

Dat minimum ging later verder omhoog: **MODX 3.2 vereist PHP 8.1 of hoger**. Upgrade je van 2.x naar een huidige 3.x-release, plan dus PHP 8.1+, niet alleen de oorspronkelijke 3.0-eis van 7.2.

Webserver- en databasevereisten: zie [server vereisten](aan-de-slag/server-vereisten).

## Core-map

De core-map kan in 3.0 niet meer naar een custom pad verplaatst of hernoemd worden. Dat komt door Composer-integratie voor dependencies en autoloading in de core.

### Upgraden met een custom core

Heb je nu een custom core-directory of een core buiten de webroot, draai dat terug vóór je naar 3.0 upgrade:

1. Verplaats de core terug naar `/core/` in de root van de installatie
2. Pas `core/config/config.inc.php` aan met het nieuwe core-pad
3. Pas `config.core.php`, `/manager/config.core.php` en `/connectors/config.core.php` aan
4. Draai daarna de MODX-installer om te verifiëren

### Beveiliging zonder core buiten de webroot

Fysiek verplaatsen van de core buiten de webroot is vanuit security-oogpunt hetzelfde als toegang blokkeren via de webserver. Voorbeeld op Apache:

```apache
RewriteRule ^(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php)  /index.php?q=doesnotexist [L,R=404]
```

Op nginx:

```nginx
location ~ ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) {
    rewrite ^/(\.(?!well_known)|_build|_gitify|_backup|core|config.core.php) /index.php?q=doesnotexist;
}
```

Meer: [Core folder (EN)](/current/en/getting-started/upgrading-to-3.0/core-folder) en [Securing MODX (EN)](/current/en/getting-started/maintenance/securing-modx).

## sqlsrv

Ondersteuning voor sqlsrv-databases is verwijderd. Migreer eerst naar MySQL: [sqlsrv migration (EN)](/current/en/getting-started/upgrading-to-3.0/sqlsrv).

## Belangrijkste breaking changes

- Minimum PHP: 7.2 in 3.0, daarna **8.1 in 3.2**
- Geen custom core-pad meer
- sqlsrv verwijderd
- Veel (voorheen unnamespaced) classes hernoemd en verplaatst, inclusief processors en model classes: [class names (EN)](/current/en/getting-started/upgrading-to-3.0/class-names), [processors (EN)](/current/en/getting-started/upgrading-to-3.0/processors)
- `modAction` en gerelateerde functionaliteit verwijderd: [actions (EN)](/current/en/getting-started/upgrading-to-3.0/actions)
- `modRestClient` verwijderd; vervangen door een PSR-7/17/18 HTTP-service
- `@EVAL`-binding verwijderd van TVs
- Volledige lijst: [Breaking changes (EN)](/current/en/getting-started/upgrading-to-3.0/breaking-changes)

## Andere opvallende verbeteringen

### Manager / interface

- Nieuwe template picker bij Resource-aanmaak
- Vernieuwde installer en login
- Redesign van de manager, beter op mobiel
- Taal kan on-the-fly gewisseld worden
- Meer consistente duplicatie van resources/elements

### Packages, files & media

- Markdown in package-attributen (changelog/readme/license)
- Media sources gebruiken Flysystem
- Core-directories zijn beschermd tegen hernoemen/verwijderen vanuit de manager

### Resources & Templates

- Resources kunnen een icoon krijgen op basis van content type
- Nieuwe output modifiers voor bestanden: `dirname`, `basename`, `filename`, `extensions`

## Aanbevolen volgorde

1. Backup van bestanden en database
2. Zit je onder 2.6, upgrade eerst naar 2.6. Daarna naar de nieuwste 2.8 en check de MODX-logs op deprecation-warnings
3. Upgrade extras die 3.x ondersteunen; check [SiteDash](https://sitedash.app/extras)
4. Zorg voor PHP 8.1+ (voor huidige 3.x) en MySQL/MariaDB volgens de [server vereisten](aan-de-slag/server-vereisten)
5. Zet een custom core terug naar `/core/` indien van toepassing
6. Volg het [standaard upgradeproces](aan-de-slag/upgraden)
7. Test manager, frontend, extras en custom code; los class-/processor-renames op waar nodig

---
title: "Upgraden"
sortorder: "6"
translation: "getting-started/maintenance/upgrading"
---

Dit beschrijft het standaardproces om een bestaande MODX Revolution-installatie te upgraden (meestal binnen de 3.x-lijn, of vanaf een recente 2.x-site nadat je de 3.0-wijzigingen hebt gepland).

- Upgraden **van 2.x naar 3.0+**: setup accepteert alleen **2.6.0 of nieuwer**. Lees eerst [Upgraden van 2.x naar 3.0](aan-de-slag/upgraden-naar-3.0). Namespaces, processors, het vaste core-pad en PHP-eisen veranderen.
- Controleer of je host voldoet aan de huidige [server vereisten](aan-de-slag/server-vereisten). **MODX 3.2+ vereist PHP 8.1 of hoger** (3.0 stond oorspronkelijk PHP 7.2+ toe).
- Upgraden vanaf Evolution (1.x) wordt niet officieel ondersteund; historische notes: [Evolution (EN)](/current/en/getting-started/maintenance/upgrading/evolution).

## Upgraden van MODX Revolution

Deze instructies gaan uit van een standaard installatie. Voor Git: zie [Git Installation (EN)](/current/en/getting-started/installation/git).

De nieuwste release download je op <https://modx.com/download/>.

Maak **altijd** een backup van bestanden én database vóór je upgrade. Upgrades gaan meestal soepel, maar een backup is slim en veilig.

Zorg vóór de core-upgrade dat alle packages up-to-date en werkend zijn op je huidige versie. Verouderde extras zijn een veelvoorkomende oorzaak van fatale fouten na een upgrade, waardoor je uit de manager kunt raken.

Checklist vóór upgraden:

- PHP- en databaseversies voldoen aan de [server vereisten](aan-de-slag/server-vereisten) van de doelrelease
- Upgrade packages indien nodig
- Log uit in MODX (gebruik "Flush Sessions and Log Out" in het manager-menu)
- Verwijder de bestanden in `core/cache/`

## Bestanden uploaden

Upload bij voorkeur niet via FTP bestanden die je lokaal hebt uitgepakt. FTP kan bestanden missen of corrumperen, en is trager dan uitpakken op de server. Staat er geen extractie in de file manager, kijk dan in het control panel.

Voor traditional: upload de MODX.zip, pak uit op de server in een nieuwe map, selecteer alle uitgepakte bestanden en merge/kopieer ze naar je MODX-root. Verwijder daarna zip en tijdelijke map. Je root bevat nu de gemergede bestanden plus een nieuwe `setup/`-map.

Voor advanced: hetzelfde, maar meestal alleen voor `core/` en `setup/`. Zorg dat `manager/` en `connectors/` schrijfbaar zijn.

Overschrijf **niet** `core/config/config.inc.php`, en zorg dat die schrijfbaar is. Wis of overschrijf ook niet `core/components/`.

Je wilt directories **mergen**, niet blind overschrijven. Gebruik een FTP-client die directory merging ondersteunt, of beter: extractie op de server.

**Overschrijf geen directories!** Zorg dat je FTP-programma mappen *merged* en niet vervangt.

## Setup starten

Ga in de browser naar `https://jouwsite.nl/setup/`. Kies je taal en volg het proces. Kies de upgrade die je wilt (normal of database).

Update zou voorselecteerd moeten staan. Zo niet, kies **Upgrade Normal** zodat je bestaande database niet wordt overschreven. **New Site** wist je database.

Bij de **Advanced**-distributie: laat "Core Package has been manually unpacked" en "Files in-place" uitgevinkt, en zorg dat `core/`, `manager/` en `connectors/` schrijfbaar zijn.

Fouten tijdens setup? Zie [Troubleshooting Installation (EN)](/current/en/getting-started/installation/troubleshooting) en [Troubleshooting Upgrades (EN)](/current/en/getting-started/maintenance/upgrading/troubleshooting).

## Na setup

Verwijder de `setup/`-map via de laatste optie, zodat niemand setup opnieuw kan draaien.

`config.inc.php` hoort CHMOD 644 te hebben.

Wis ook de browsercache na een upgrade. Browsers cachen JS en CSS; je wilt de nieuwste bestanden laden.

## Versiespecifieke wijzigingen

- [Upgraden van 2.x naar 3.0](aan-de-slag/upgraden-naar-3.0) (verplicht lezen voor elke 2.x → 3.x-stap; inclusief PHP 7.2 → **8.1 in 3.2**)
- [Upgrading to 2.8.2 / 2.8.3 (EN)](/current/en/getting-started/maintenance/upgrading/2.8.2) (security-gerelateerd gedrag, nog relevant vóór een sprong naar 3.x)

## macOS

Bij kopiëren in Finder kan macOS mappen "vervangen" in plaats van mergen. Gebruik `ditto` of `cp -fr` vanaf de command line, anders verdwijnt `core/config/config.inc.php`. Voorbeeld na uitpakken:

```bash
ditto modx-3.2.0-pl /www/public_html/modx/
```

of:

```bash
cp -fr modx-3.2.0-pl/* /www/public_html/modx
```

## Zie ook

1. [Upgraden van 2.x naar 3.0](aan-de-slag/upgraden-naar-3.0)
2. [Server vereisten](aan-de-slag/server-vereisten)
3. [Troubleshooting Upgrades (EN)](/current/en/getting-started/maintenance/upgrading/troubleshooting)

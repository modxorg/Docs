---
title: "Vriendelijke URLs"
sortorder: "5"
translation: "getting-started/friendly-urls"
description: "SEO-vriendelijke URLs inschakelen in MODX 3"
---

Friendly URLs (FURLs) vervangen adressen als `index.php?id=42` door leesbare paden op basis van Resource-aliassen, bijvoorbeeld `/over-ons/` of `/blog/mijn-bericht`.

Je hebt twee dingen nodig:

1. Rewrite-regels op de webserver die onbekende paden naar `index.php` sturen
2. Friendly URL-instellingen in MODX

## 1. Configureer je webserver

Kies de handleiding voor je server:

- [Apache](aan-de-slag/vriendelijke-urls/apache) (meeste shared hosting; `ht.access` → `.htaccess`)
- [nginx (EN)](/current/en/getting-started/friendly-urls/nginx)
- [lighttpd (EN)](/current/en/getting-started/friendly-urls/lighttpd)

Zolang rewrites niet werken, geven pretty paths een 404 zodra je Friendly URLs in MODX aanzet.

## 2. Schakel Friendly URLs in MODX in

Ga in de Manager naar **Systeeminstellingen** (tandwiel in de topnavigatie, daarna Systeeminstellingen).

Filter op key `friendly` (of Area-filter op Friendly URL). Zet minstens:

| Instelling | Key | Typische waarde |
| ---------- | --- | --------------- |
| Use Friendly URLs | `friendly_urls` | Yes |
| Use Friendly Alias Path | `use_alias_path` | Yes (toon volledig pad via ouders) |

Met **Use Friendly Alias Path** op No gedragen aliassen zich alsof elke Resource in de siteroot zit; parent-mappen in de boom worden genegeerd.

Container-Resources (mappen in de boom) gebruiken de [container_suffix](/current/en/building-sites/settings/container_suffix)-instelling (default `/`) in plaats van de oude `friendly_url_prefix` / `friendly_url_suffix`, die zijn vervangen door [Content Types](/current/en/building-sites/resources/content-types).

## 3. Zet een base href in je Templates

Plaats dit in de `<head>` van elke HTML-Template:

```html
<base href="[[!++site_url]]" />
```

Zo lossen relatieve asset-URL's correct op vanaf de siteroot, ook op geneste Friendly URL-paden.

## 4. Wis de sitecache

Wis de cache vanuit de Manager (of verwijder `core/cache/`) zodat frontend-links de nieuwe instellingen oppikken.

## Links bouwen

Gebruik link-tags zodat URL's correct blijven als je Resources verplaatst:

```html
<a href="[[~1]]" title="Een titel">Een pagina</a>
```

Zie [Resources (EN)](/current/en/building-sites/resources) voor de link-tag-syntax.

## Optioneel: www- en HTTPS-redirects

Als FURLs werken, kies één canonieke host (`www` of kaal domein) en HTTP vs HTTPS. Zo voorkom je sessie- en SEO-problemen door dubbele hostnames.

Op Apache staan voorbeelden in het meegeleverde `ht.access`-bestand (uitgecommentarieerd). Uncomment alleen het blok dat je nodig hebt en vervang het voorbeelddomein. Details: [Apache](aan-de-slag/vriendelijke-urls/apache).

Op nginx zet je vergelijkbare `return 301`-logica in de juiste `server`-blocks.

## Gerelateerd

- [Server vereisten](aan-de-slag/server-vereisten)
- [Content Types (EN)](/current/en/building-sites/resources/content-types)
- [Troubleshooting Installation (EN)](/current/en/getting-started/installation/troubleshooting)

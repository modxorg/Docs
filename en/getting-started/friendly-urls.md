---
title: "Using Friendly URLs"
sortorder: "5"
description: "Enable SEO-friendly URLs in MODX 3"
---

Friendly URLs (FURLs) replace addresses like `index.php?id=42` with readable paths based on Resource aliases, such as `/about/` or `/blog/my-post`.

You need two things:

1. Web server rewrite rules sending unknown paths to `index.php`
2. Friendly URLs enabled in MODX

## 1. Configure your web server

**MODX Cloud:** rewrite rules are already in place — skip this step.

Other servers: pick your guide:

- [Apache](getting-started/friendly-urls/apache) (most shared hosting; uses `ht.access` → `.htaccess`)
- [IIS](getting-started/friendly-urls/iis) (`web.config` + URL Rewrite)
- [nginx](getting-started/friendly-urls/nginx)
- [lighttpd](getting-started/friendly-urls/lighttpd)

Until rewrites work, enabling Friendly URLs in MODX will 404 on pretty paths.

## 2. Enable Friendly URLs in MODX

In the Manager, open **System Settings** (gear icon, top navigation).

Filter by key `friendly` (or Area: Friendly URL), then set at least:

| Setting | Key | Typical value | Default |
| ------- | --- | ------------- | ------- |
| Use Friendly URLs | `friendly_urls` | Yes | No |
| Use Friendly Alias Path | `use_alias_path` | Yes (show full path from parents) | No |

Optional: [friendly_urls_strict](building-sites/settings/friendly_urls_strict) returns 404 for unknown aliases instead of falling back to the pagetitle.

With **Use Friendly Alias Path** set to No, Resources behave as if they sit at the site root, ignoring parent folders.

Container Resources (folders) use the [container_suffix](building-sites/settings/container_suffix) setting (default `/`) instead of `friendly_url_prefix` / `friendly_url_suffix`, removed in favour of [Content Types](building-sites/resources/content-types). It applies only to folders whose content type is HTML.

For non-Latin pagetitles, configure alias transliteration (`friendly_alias_translit`: `none` (default), `iconv`, `iconv_ascii`, or a named table): [Alias transliteration](getting-started/friendly-urls/transliteration).

## 3. Add a base href in your Templates

Put this in the `<head>` of every Template serving HTML:

``` html
<base href="[[!++site_url]]" />
```

Relative asset URLs then resolve from the site root, even on nested paths.

## 4. Clear the site cache

Saving these settings rebuilds the URIs and reloads the config automatically. If the frontend still serves stale links or pages, clear the cache from the Manager (or delete `core/cache/`) — also needed after editing aliases or Templates.

## Building links

Prefer link tags so URLs stay correct when you move Resources:

``` html
<a href="[[~1]]" title="Some title">Some Page</a>
```

See [Resources](building-sites/resources) for link tag syntax.

## Optional: www and HTTPS redirects

After FURLs work, pick one canonical host (`www` or bare domain) and HTTP or HTTPS — duplicate hostnames cause session and SEO issues.

On Apache, the shipped `ht.access` file has commented-out example rules: uncomment the block you need and replace the domain. See the [Apache guide](getting-started/friendly-urls/apache).

On nginx, put equivalent `return 301` logic in the matching `server` blocks.

On IIS, add equivalent redirect rules in `web.config` (see the [IIS guide](getting-started/friendly-urls/iis)).

## Related

- [Alias transliteration](getting-started/friendly-urls/transliteration)
- [friendly_urls_strict](building-sites/settings/friendly_urls_strict)
- [Server Requirements](getting-started/server-requirements)
- [Content Types](building-sites/resources/content-types)
- [Troubleshooting Installation](getting-started/installation/troubleshooting)

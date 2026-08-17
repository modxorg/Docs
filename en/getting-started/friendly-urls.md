---
title: "Using Friendly URLs"
sortorder: "5"
description: "Enable SEO-friendly URLs in MODX 3"
---

Friendly URLs (FURLs) replace addresses like `index.php?id=42` with readable paths based on Resource aliases, for example `/about/` or `/blog/my-post`.

You need two things:

1. Web server rewrite rules that send unknown paths to `index.php`
2. Friendly URL settings turned on in MODX

## 1. Configure your web server

**MODX Cloud:** rewrite rules are already in place. Skip this step and continue with the Manager settings below.

Everyone else: pick the guide for your server:

- [Apache](getting-started/friendly-urls/apache) (most shared hosting; uses `ht.access` → `.htaccess`)
- [IIS](getting-started/friendly-urls/iis) (`web.config` + URL Rewrite)
- [nginx](getting-started/friendly-urls/nginx)
- [lighttpd](getting-started/friendly-urls/lighttpd)

Until rewrites work, enabling Friendly URLs in MODX will 404 on pretty paths.

## 2. Enable Friendly URLs in MODX

In the Manager, open **System Settings** (gear icon in the top navigation, then System Settings).

Filter by key `friendly` (or set the Area filter to Friendly URL). Set at least:

| Setting | Key | Typical value |
| ------- | --- | ------------- |
| Use Friendly URLs | `friendly_urls` | Yes |
| Use Friendly Alias Path | `use_alias_path` | Yes (show full path from parents) |

With **Use Friendly Alias Path** set to No, aliases behave as if every Resource sits at the site root, ignoring parent folders in the tree.

Container Resources (folders in the tree) use the [container_suffix](building-sites/settings/container_suffix) setting (default `/`) instead of the old `friendly_url_prefix` / `friendly_url_suffix` settings, which were removed in favour of [Content Types](building-sites/resources/content-types).

For non-Latin pagetitles, configure alias transliteration (`friendly_alias_translit`, iconv, or the Translit extra): [Alias transliteration](getting-started/friendly-urls/transliteration).

## 3. Add a base href in your Templates

Put this in the `<head>` of every Template that serves HTML:

``` html
<base href="[[!++site_url]]" />
```

That makes relative asset URLs resolve from the site root even on nested Friendly URL paths.

## 4. Clear the site cache

Clear the cache from the Manager (or delete `core/cache/`) so frontend links pick up the new settings.

## Building links

Prefer link tags so URLs stay correct when you move Resources:

``` html
<a href="[[~1]]" title="Some title">Some Page</a>
```

See [Resources](building-sites/resources) for link tag syntax.

## Optional: www and HTTPS redirects

After FURLs work, decide on one canonical host (`www` or bare domain) and HTTP vs HTTPS. Doing this avoids session and SEO issues from duplicate hostnames.

On Apache, example rules live in the shipped `ht.access` file (commented out). Uncomment only the block you need and replace the example domain. Details are in the [Apache guide](getting-started/friendly-urls/apache).

On nginx, put equivalent `return 301` logic in the matching `server` blocks.

On IIS, add equivalent redirect rules in `web.config` (see the [IIS guide](getting-started/friendly-urls/iis)).

## Related

- [Alias transliteration](getting-started/friendly-urls/transliteration)
- [Server Requirements](getting-started/server-requirements)
- [Content Types](building-sites/resources/content-types)
- [Troubleshooting Installation](getting-started/installation/troubleshooting)

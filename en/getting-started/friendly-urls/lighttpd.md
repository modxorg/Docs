---
title: "Friendly URLs on lighttpd"
_old_id: "169"
_old_uri: "2.x/getting-started/installation/basic-installation/lighttpd-guide"
---

lighttpd does not use Apache-style `.htaccess` files. Friendly URL rewrites belong in `lighttpd.conf` (often `/etc/lighttpd/lighttpd.conf` on Linux).

This setup is uncommon for MODX hosting. Prefer [Apache](getting-started/friendly-urls/apache) or [nginx](getting-started/friendly-urls/nginx) when you can. After rewrites work, finish the MODX steps in [Using Friendly URLs](getting-started/friendly-urls).

## Enable mod_rewrite

1. Open `lighttpd.conf`.
2. Find `server.modules`.
3. Ensure `mod_rewrite` is listed and not commented out.
4. Reload lighttpd after saving.

## Add rewrite rules

Find the host / document-root block for the site, for example:

``` lighttpd
$SERVER["socket"] == ":80" {
  $HTTP["host"] =~ "example.com" {
    server.document-root = "/var/www/example.com"
    server.name = "example.com"
```

Add rules under that host so existing files and the `assets`, `manager`, `core`, and `connectors` trees are not rewritten:

``` lighttpd
    url.rewrite-once = (
        "^/(assets|manager|core|connectors)(.*)$" => "/$1/$2",
        "^/(?!index(?:-ajax)?\.php)(.*)\?(.*)$" => "/index.php?q=$1&$2",
        "^/(?!index(?:-ajax)?\.php)(.*)$" => "/index.php?q=$1"
    )
```

## Exclude more paths

lighttpd only skips paths you list. To protect another web-accessible directory, extend the first pattern with `|dirname`, for example `(assets|manager|core|connectors|media)`.

Reload lighttpd, then enable Friendly URLs in the Manager and clear the cache.

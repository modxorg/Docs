---
title: Friendly URLs on Apache
description: 'Using friendly URLs on Apache with mod_rewrite.'
---

MODX ships an `ht.access` file in the site root. Apache ignores it until you rename or copy it to `.htaccess`. You need `mod_rewrite` enabled.

For the MODX-side settings (`friendly_urls`, base href, cache), see [Using Friendly URLs](getting-started/friendly-urls).

## Minimum rules

Use at least the following on a root install. These rules keep Let's Encrypt's `.well-known/` reachable, and forbid other dotfiles, hidden directories (for example `.git`), and direct access to `core/`:

``` apache
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

The shipped `ht.access` also includes commented HTTPS / www redirects. For broader lockdown (`config.core.php`, `_build/`, and related paths), see [Hardening MODX](getting-started/maintenance/securing-modx).

## Subdirectory installs

If MODX lives in a subdirectory, set `RewriteBase` to that path, including the trailing slash:

``` apache
RewriteBase /subdirectoryName/
```

This is most often needed on local installs under a subfolder.

## Where to put `.htaccess`

Place it in the MODX site root (next to `index.php`, `manager/`, `connectors/`). It can sit higher in the tree, but the site root is the usual location.

If the host already has an `.htaccess` in that directory, merge carefully: keep a backup, then append the MODX rewrite block below the host rules unless the host docs say otherwise.

## Optional: force www or non-www

Uncomment only one of the www blocks in `ht.access`, and change the example domain to yours. Example that redirects `www.yoursite.com` to `yoursite.com` over HTTPS:

``` apache
RewriteCond %{HTTP_HOST} .
RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]
RewriteRule ^(.*)$ https://%1/$1 [R=301,L]
```

## Optional: force HTTPS

``` apache
RewriteCond %{HTTPS} !=on [OR]
RewriteCond %{SERVER_PORT} !^443
RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

## Optional: collapse `/index.php` duplicates

Search engines treat `/`, `/index.php`, and similar as duplicate content. A common fix:

``` apache
RewriteCond %{THE_REQUEST} ^[A-Z]{3,9}\ /index\.(php|html|htm)\ HTTP/
RewriteRule ^(.*)index\.(php|html|htm)$ $1 [R=301,L]
```

Always keep a working backup of `.htaccess` before editing. A syntax error can take the whole site offline until you restore the file.

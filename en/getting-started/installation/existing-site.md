---
title: "Installing alongside an existing site"
sortorder: "6"
description: "Subdirectory installs, existing HTML/CMS sites, and temporary hosting URLs"
---

Use this page when you are not installing MODX into a clean, empty web root. For the normal empty-hosting case, follow [Basic Installation](getting-started/installation/standard).

Always **back up** existing files and databases before you change anything.

## Subdirectory install

Installing into a subdirectory (for example `https://example.com/modx/`) is a good approach when:

- You are building a replacement site while the current site stays online
- You want a temporary or staging copy on the same host

Complete [Basic Installation](getting-started/installation/standard) with the files in that subdirectory, and open `https://example.com/modx/setup/` (adjust the path). When the new site is ready, you can [move it](getting-started/maintenance/moving-your-site) to the domain root, or keep it in the subdirectory and optionally rewrite URLs with your web server.

## Existing static HTML site

You can unpack MODX next to an existing `index.html` (or similar) while you build templates and content. Until you are ready to go live:

1. Do **not** enable [Friendly URLs](getting-started/friendly-urls) yet if that would make MODX catch requests meant for your static files.
2. When you cut over, rename or remove the old static entry files (and any conflicting assets), then enable Friendly URLs if you want them.

## Existing CMS or other dynamic app

Do **not** unpack MODX into the same directory as another live CMS or app. Use a subdirectory (or a separate vhost/domain), install there, and cut over only after the new site works.

## Temporary URL or pre-DNS folder

Some hosts give you a temporary URL or folder before DNS points at the account. You can install there, but after the final domain and path are fixed you must update MODX paths. Follow [Moving Your Site](getting-started/maintenance/moving-your-site), and in particular review:

- `core/config/config.inc.php`
- `config.core.php` (site root)
- `manager/config.core.php`
- `connectors/config.core.php`

Clear `core/cache/` after path changes.

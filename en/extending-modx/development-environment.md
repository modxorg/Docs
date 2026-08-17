---
title: "Setting up a Development Environment"
_old_id: "282"
_old_uri: "2.x/developing-in-modx/overview-of-modx-development/setting-up-a-development-environment"
description: "Local MODX setup for building Extras, Snippets, Plugins, and Custom Manager Pages"
---

## Who this page is for

Use this when you build **Extras** (Snippets, Plugins, Custom Manager Pages, Transport Packages) against a local MODX Revolution site.

If you change **MODX core** itself, follow [Contribute: Development Environments](contribute/code/development-environment) instead (fork, upstream remote, tooling).

For a full walkthrough of one Extra from Snippet to package, use [Developing an Extra](extending-modx/tutorials/developing-an-extra). This page is the environment checklist that tutorial assumes.

## What you need

- A local web server and PHP/MySQL that meet [Server Requirements](getting-started/server-requirements) for the MODX version you target (Revolution 3.x needs PHP 8.1+ and Composer for git installs)
- A working local MODX site you can break and reinstall
- An editor or IDE (PhpStorm, VS Code, and similar all work)
- Optional but useful: Git for the Extra project, and Composer if you install MODX from git

You do not need a second MODX install per Extra. One local site can host many Extras under development.

## Install local MODX

Pick one path:

1. **Traditional zip** — download from [modx.com/download](https://modx.com/download/), extract under your web root, run [Setup](getting-started/installation/standard). Fastest for Extra work when you do not need bleeding-edge core.
2. **From git** — clone the `3.x` branch, run `composer install`, build the core package, then Setup. Required if you also contribute to core. See [Git Installation](getting-started/installation/git).

After Setup, log into the Manager and confirm the site loads. Clear `core/cache/` whenever config or path experiments go wrong.

Give this install a **unique** [`session_name`](building-sites/settings/session_name) (for example `modxlocaldevsession`) so cookies do not clash with other local MODX sites on the same domain. Empty `core/cache/` and log in again after changing it.

## Recommended directory layout

Keep the Extra **outside** the MODX core tree so Git history stays clean and you never commit core files by mistake.

Example (adjust to your machine):

``` text
/www/modx/                 ← MODX Revolution install (web root or vhost)
/www/doodles/              ← Extra project (its own Git repo)
  assets/components/doodles/
  core/components/doodles/
  _build/
```

After install, a Transport Package will place files under `core/components/yourpkg/` and `assets/components/yourpkg/` inside the MODX site. During development you either:

- develop in that layout **inside** a clone that mirrors the installed paths, then teach MODX where the files live with Namespace / System Settings, or
- symlink or copy into the MODX tree (works, but Git and updates get messier)

The [Developing an Extra](extending-modx/tutorials/developing-an-extra) tutorial uses a separate `/www/doodles/` project and points MODX at it with path System Settings. That pattern scales well for teams.

Typical Extra folders:

| Path | Role |
| --- | --- |
| `core/components/yourpkg/` | PHP: model, elements, lexicon, processors, controllers |
| `assets/components/yourpkg/` | JS, CSS, images, `connector.php` for CMP AJAX |
| `_build/` | Build scripts and packaging data (not shipped in the zip) |

See also [Creating Components: component structure](extending-modx/creating-components/component-structure) and [Transport Packages](extending-modx/transport-packages).

## Connect MODX to your Extra

1. Create a **Namespace** in the Manager (`yourpkg`) with paths that match your project’s `core` and `assets` directories.
2. Add System Settings such as `yourpkg.core_path` and `yourpkg.assets_url` (or the names your Extra expects) so Snippets and services resolve files outside the default `core/components/` location.
3. Register elements (Snippet, Plugin, CMP menu) that call into those paths, or load them via your build/install script.

Until paths resolve, `$modx->getService()` and processors fail with missing class or file errors. Fix Namespace and settings first, then clear the cache.

If the Extra is served from another local URL path than the Manager (for example Manager at `/modx/manager/` and Extra assets at `/doodles/`), set [`session_cookie_path`](building-sites/settings/session_cookie_path) to `/` so both share the login session. Clear cache and re-login after changing it.

## Settings that speed Extra work

| Setting | Why |
| --- | --- |
| [`cache_lexicon_topics`](building-sites/settings/cache_lexicon_topics) = No | Lexicon edits show up without fighting topic cache |
| [`session_name`](building-sites/settings/session_name) | Unique per local site |
| [`session_cookie_path`](building-sites/settings/session_cookie_path) | Shared session across local paths when needed |

While iterating PHP, clear `core/cache/` or use Manage → Clear Cache after path or class map changes. For schema/model work, regenerate maps with your Extra’s build schema script, then clear cache again.

## Packaging

When the Extra works from the Manager:

1. Keep `_build/` in the Extra repo (resolvers, data vehicles, build script)
2. Run the build to produce a Transport Package under `core/packages/` (or your build output path)
3. Install or upgrade that package on a clean local MODX to verify

Step-by-step packaging is in [Developing an Extra, Part III](extending-modx/tutorials/developing-an-extra/part-3). Alternative tools such as [PackMan](extras/packman) suit simpler Extras built mostly inside the Manager.

## Suggested learning path

1. This page — local site and Extra layout
2. [Developer Introduction](extending-modx/getting-started/developer-introduction) — MVC², connectors, processors
3. [Developing an Extra](extending-modx/tutorials/developing-an-extra) — Snippet, CMP, package
4. [Creating Components](extending-modx/creating-components) — another full course (PhpStorm-oriented)
5. [Custom Manager Pages](extending-modx/custom-manager-pages) and [xPDO](extending-modx/xpdo) when you need depth

## See also

- [Git Installation](getting-started/installation/git)
- [Contribute: Development Environments](contribute/code/development-environment) (core work)
- [Contribute: Tooling](contribute/code/tooling)
- [Server Requirements](getting-started/server-requirements)

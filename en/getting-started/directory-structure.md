---
title: "Explanation of Directory Structure"
sortorder: 6
_old_id: "108"
_old_uri: "2.x/getting-started/an-overview-of-modx/glossary-of-revolution-terms/explanation-of-directory-structure"
---

The root of a MODX 3 installation is split into several directories, each with a clear role. In 3.x the **`core/` directory must stay at `/core/` in the project root** (it cannot be renamed or moved). The `manager/` and `connectors/` directories can still be renamed during an [Advanced Installation](getting-started/installation/advanced). See also [Core folder changes in 3.0](getting-started/upgrading-to-3.0/core-folder).

Typical top-level layout after install:

- `index.php` - front controller for the web context
- `ht.access` - Apache rewrite template (rename/copy to `.htaccess` for Friendly URLs)
- `composer.json` - PHP dependency definition (Composer installs into `core/vendor/`)
- `connectors/` - AJAX / connector entry points
- `core/` - application code, config, cache, packages, vendor libraries
- `manager/` - Manager (back-end) UI
- `setup/` - installer (remove after install/upgrade)
- `_build/` - present mainly in Git checkouts; used to build the core transport package
- `assets/` - not shipped by default; commonly used for media and Extra front-end files

## connectors/

Connectors are HTTP entry points for Manager (and other) AJAX requests. They do not change the database themselves. They bootstrap MODX, sanitize the request, and hand off to a [Processor](extending-modx/processors).

In 3.x most manager traffic goes through `connectors/index.php` with an `action` parameter (for example `Resource/Create`). That resolves to a class under `core/src/Revolution/Processors/`.

### Notable files

- **connectors/index.php** - main connector bootstrap. Custom connectors typically include this file (or mirror its bootstrap) and then call `$modx->request->handleRequest()`.
- **connectors/config.core.php** - created by setup; points at the core path and config key.
- **connectors/system/** - a few dedicated system connector endpoints still live as separate scripts.

## core/

The core holds almost everything that makes MODX run, aside from the Manager UI assets and setup. Dependencies are managed with Composer and live in `core/vendor/`. The main MODX code lives in `core/src/`. 

### core/vendor/

Created by `composer install` (and included in traditional distribution packages). Contains third-party libraries such as xPDO, Smarty, Flysystem, Guzzle, and PHPMailer. The Composer autoloader is `core/vendor/autoload.php`. Do not edit this tree by hand; change dependencies via Composer.

### core/src/

PSR-4 root for the `MODX\` namespace (`"MODX\\": "core/src/"` in `composer.json`). Application code for 3.x lives primarily here.

#### core/src/Revolution/

Namespaced core classes (`MODX\Revolution\...`): the `modX` service, model objects, services, controllers used by the Manager, and related components.

Notable subdirectories include:

- **Processors/** - request handlers invoked via connectors (create/update/remove lists, browser, security, and so on)
- **Controllers/** - Manager page controller classes
- **Services/** - shared services (HTTP client, and others registered on the MODX container)
- **Transport/** - transport package building/installation support
- **Sources/** - media source drivers
- **Smarty/** - MODX's Smarty integration (`modSmarty`)
- **mysql/** - MySQL-specific xPDO map/class files for core objects

### core/model/

Mostly reserved for the XML **schema** and a thin backwards-compatibility stub.

- **core/model/schema/** - XML schemas used when generating maps/classes during development (`modx.mysql.schema.xml`, transport/sources schemas, and related files). Not read on every front-end request.
- **core/model/modx/modx.class.php** - legacy stub that loads Composer’s autoloader for older include paths.

Runtime model classes and processors are under `core/src/Revolution/`, not under the old `core/model/modx/` class tree from 2.x.

### core/include/

- **deprecated.php** - compatibility helpers loaded for deprecated 2.x-era APIs where aliases still exist.

### core/cache/

Generated cache files: configuration, contexts, resources, elements, lexicons, Smarty, and more. Safe to clear (MODX will rebuild on demand). Logging goes to **core/cache/logs/** (notably `error.log`). Use `$modx->log()` to write log entries.

Context-specific cache (for example `web` and `mgr`) stores overridden context settings and, for web, cached resources/elements such as `cache/web/resources/12.cache.php`.

### core/components/

Created when you install Extras. Each package typically gets `core/components/<package>/` for PHP that should not be web-accessible (processors, model code, private assets).

### core/config/

Holds `config.inc.php` (database credentials, paths, and related options). Created/updated by setup. Keep this file private and backed up.

### core/docs/

Changelog (`changelog.txt`), license text, and `version.inc.php`.

### core/error/

Error page templates for severe errors where MODX is unable to run.

### core/export/ and core/import/

Targets used by the Manager HTML export/import tools and third party extras (`export/` for output, `import/` for files you place there to import).

### core/lexicon/

File-based lexicon topics, organized by culture code (for example `core/lexicon/en/`). Topics are files like `default.inc.php`. Entries can be overwritten through Lexicon Management, which stores them in the database. 

Load a topic in code with:

``` php
$modx->lexicon->load('lang:namespace:topic');
```

- **lang** - optional culture key (defaults to the current culture, often `en`)
- **namespace** - usually `core` for the built-in strings, or an Extra’s namespace
- **topic** - the topic file name without `.inc.php`

### core/packages/

Downloaded and built [transport packages](extending-modx/transport-packages), including `core.transport.zip` used by setup. Package Management reads and writes here.

### Notable cache files

- **core/cache/config.cache.php** - cached [System Settings](building-sites/settings). Clearing `core/cache/` forces a rebuild from the database.
- **core/cache/sitePublishing.idx.php** - tracks auto-publish/unpublish timing, not a full-site content cache.

## manager/

The Manager back-end for editing resources, elements, users, and system settings.

### manager/assets/

Front-end assets for the Manager UI:

- **ext3/** - Ext JS 3 libraries used by the Manager
- **modext/** - MODX’s ModExt layer and Manager widgets on top of Ext JS
- **lib/**, **fileapi/** - supporting JS libraries

### manager/controllers/

PHP entry scripts that bootstrap Manager pages (under `manager/controllers/default/` for the default Manager theme). They prepare data and register Ext JS / ModExt components; much of the heavier logic lives in classes under `core/src/Revolution/Controllers/`.

### manager/templates/

Smarty templates for Manager pages (`manager/templates/default/`). These are HTML/Smarty, not PHP business logic.

### Notable files

- **manager/index.php** - Manager front controller
- **manager/config.core.php** - created by setup; points at the core

## setup/

The installer and upgrader. Run it for new installs and upgrades, then remove the `setup/` directory when finished. Contains its own controllers, templates, language files, and CLI entry (`cli-install.php`). See [Installation](getting-started/installation) and [Command Line Installation](getting-started/installation/cli).

As a security precaution, a `.locked` directory is placed in the setup after it was used. The setup will refuse to run when that directory is present. 

## \_build/

Present when you install from Git (and similar development layouts). Used to build `core/packages/core.transport.zip` via `php _build/transport.core.php` after Composer dependencies are installed. Not required on production sites installed from a traditional package. See [Git Installation](getting-started/installation/git).

## assets/

Not created by a minimal core checkout by default, but traditional installs and almost all sites use it for media, CSS, and JavaScript.

### assets/components/

Web-accessible Extra files (JS, CSS, images) installed by Package Management, typically mirrored with `core/components/<package>/`.

## Related

- [Server Requirements](getting-started/server-requirements)
- [Hardening MODX](getting-started/maintenance/securing-modx) (block public access to `core/` and related paths)
- [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0) (namespaces, processors, fixed core path)

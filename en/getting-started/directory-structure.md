---
title: "Explanation of Directory Structure"
sortorder: 6
_old_id: "108"
_old_uri: "2.x/getting-started/an-overview-of-modx/glossary-of-revolution-terms/explanation-of-directory-structure"
---

Top-level layout after install:

| Path | Purpose |
|---|---|
| `index.php` | Front controller for the web context |
| `ht.access` | Apache rewrite template; rename to `.htaccess` for Friendly URLs |
| `composer.json` | PHP dependencies, installed into `core/vendor/` |
| `connectors/` | Entry points for AJAX requests |
| `core/` | Application code, config, cache, packages, vendor libraries |
| `manager/` | Manager (back-end) UI |
| `setup/` | Installer and upgrader; remove it after install or upgrade |
| `_build/` | Builds the core transport package (Git checkouts only) |
| `assets/` | Media and Extra front-end files |

`core/` must stay at `/core/` in the project root: it cannot be moved or renamed in 3.x. `manager/` and `connectors/` can be renamed during an [Advanced Installation](getting-started/installation/advanced). See also [Core folder changes in 3.0](getting-started/upgrading-to-3.0/core-folder).

## connectors/

Connectors are HTTP entry points for Manager and other AJAX requests. Each connector loads MODX, sanitizes the request, and hands it off to a [Processor](extending-modx/processors). It never changes the database itself.

In 3.x most Manager traffic goes through `connectors/index.php` with an `action` parameter (for example `Resource/Create`). The action resolves to a class under `core/src/Revolution/Processors/`.

### Notable files

- **connectors/index.php** - main connector bootstrap. Custom connectors typically include this file (or mirror its bootstrap) and then call `$modx->request->handleRequest()`.
- **connectors/config.core.php** - created by setup; points at the core path and config key.
- **connectors/system/** - dedicated system connector endpoints, still separate scripts.

## core/

Everything that makes MODX run, except the Manager UI and setup.

### core/vendor/

Created by `composer install` and shipped with traditional packages. Third-party libraries live here: xPDO, Smarty, Flysystem, Guzzle, PHPMailer. The autoloader is `core/vendor/autoload.php`. Do not edit this tree by hand; change dependencies through Composer.

### core/src/

PSR-4 root for the `MODX\` namespace (`"MODX\\": "core/src/"` in `composer.json`).

#### core/src/Revolution/

Namespaced core classes (`MODX\Revolution\...`): the `modX` service, model objects, services, error handling, and related components.

| Directory | Contents |
|---|---|
| `Processors/` | Request handlers called through connectors, grouped by area: `Browser/`, `Context/`, `Element/`, `Model/`, `Resource/`, `Search/`, `Security/`, `SoftwareUpdate/`, `Source/`, `System/`, `Workspace/` |
| `Services/` | Shared services (HTTP client and others on the MODX container) |
| `Transport/` | Transport package build/install support |
| `Sources/` | Media source drivers |
| `Smarty/` | Smarty integration (`modSmarty`) |
| `mysql/` | MySQL-specific xPDO map/class files for core objects |
| `Error/`, `Exceptions/` | Error and exception classes |
| `File/` | File utilities and handlers |
| `Filters/` | Input/output filters |
| `Formatter/` | Data formatters |
| `Hashing/` | Hashing and password operations |
| `Mail/` | Mail sending |
| `Registry/` | Registry storage (connector communication) |
| `Rest/` | REST API server |
| `Security/` | Authentication and access control |
| `Validation/` | Data validation |

### core/model/

Mostly reserved for the XML **schema** and a thin backwards-compatibility stub.

- **core/model/schema/** - XML schemas used to generate maps and classes during development (`modx.mysql.schema.xml`, transport/sources schemas, related files). Not read on every front-end request.
- **core/model/modx/modx.class.php** - legacy stub that loads Composer's autoloader for older include paths.

Runtime model classes and processors live in `core/src/Revolution/`, not in the 2.x tree under `core/model/modx/`.

### core/include/

- **deprecated.php** - compatibility helpers for deprecated 2.x-era APIs whose aliases still exist.

### core/cache/

MODX rebuilds cache on demand, so clearing `core/cache/` is safe. Write log entries with `$modx->log()`; they go to `core/cache/logs/` (`error.log`).

The `web` context cache stores overridden context settings, resources, and elements, for example `cache/web/resources/12.cache.php`.

| Directory | Contents |
|---|---|
| `system_settings/` | System settings |
| `context_settings/` | Context settings |
| `auto_publish/` | Next auto-publish/unpublish event times |
| `lexicon_topics/` | Lexicon topics |
| `namespaces/` | Namespaces |
| `scripts/` | Compiled snippet and chunk scripts |
| `includes/` | Compiled include files |
| `elements/` (under `scripts/`, `includes/`) | Compiled elements |
| `menu/` | Manager menu |
| `mgr/` | Manager context cache |
| `registry/` | Registry state |
| `rss/` | RSS feeds |
| `logs/` | Log files |

Notable files:

- **core/cache/system_settings/config.cache.php** - cached [System Settings](building-sites/settings).
- **core/cache/auto_publish/auto_publish.cache.php** - the next auto-publish/unpublish event time per Resource, not a site content cache.

### core/components/

If an Extra ships PHP that must not be web-accessible (processors, model code, private files), it lives in `core/components/<package>/`. Not every package has one — that depends on the package.

### core/config/

`config.inc.php` holds database credentials, paths, and related options; setup creates and updates it. Keep the file private and back it up.

### core/docs/

Changelog (`changelog.txt`), license text, and `version.inc.php`.

### core/error/

Error page templates for severe errors where MODX cannot run.

### core/export/ and core/import/

Targets for the Manager HTML export/import tools and Extras: `export/` for output, `import/` for files you place there to import.

### core/lexicon/

File-based lexicon topics organized by culture code (`core/lexicon/en/`); each topic is a file such as `default.inc.php`. Lexicon Management stores edited entries in the database.

Load a topic in code with:

``` php
$modx->lexicon->load('lang:namespace:topic');
```

| Parameter | Meaning |
|---|---|
| `lang` | Optional culture key; defaults to the current culture, often `en` |
| `namespace` | `core` for built-in strings, or an Extra's namespace |
| `topic` | Topic file name without `.inc.php` |

### core/packages/

Downloaded and built [transport packages](extending-modx/transport-packages), including `core.transport.zip` used by setup. Package Management reads and writes here.

## manager/

### manager/assets/

Front-end assets for the Manager UI:

- **ext3/** - Ext JS 3 libraries used by the Manager
- **modext/** - ModExt layer and Manager widgets on top of Ext JS
- **lib/**, **fileapi/** - supporting JS libraries

### manager/controllers/

PHP entry scripts that bootstrap Manager pages (default theme: `manager/controllers/default/`). They prepare data and register Ext JS / ModExt components; request handling then goes through Processors under `core/src/Revolution/Processors/`.

Subdirectories match Manager areas: `browser/`, `context/`, `dashboard/`, `element/`, `media/`, `resource/`, `security/`, `source/`, `system/`, `workspaces/`.

### manager/templates/

Smarty templates for Manager pages in `manager/templates/default/`: HTML and Smarty, not PHP business logic.

Subdirectories mirror the controllers, plus shared `css/`, `js/`, `images/`, `fonts/`, and `email/` templates.

### Notable files

- **manager/index.php** - Manager front controller
- **manager/config.core.php** - created by setup; points at the core

## setup/

Setup ships its own `controllers/`, `processors/`, `templates/`, `lang/`, `includes/`, `assets/`, and `provisioner/` directories, plus a CLI entry (`cli-install.php`). See [Installation](getting-started/installation) and [Command Line Installation](getting-started/installation/cli).

As a security precaution, setup leaves a `.locked` directory in place after use. Setup refuses to run while that directory is present.

## \_build/

Builds `core/packages/core.transport.zip` with `php _build/transport.core.php` after Composer dependencies are installed. Not needed on production sites installed from a traditional package. See [Git Installation](getting-started/installation/git).

## assets/

A minimal core checkout does not create the directory; traditional installs and almost all sites use it.

### assets/components/

Web-accessible Extra files (JS, CSS, images) installed by Package Management, typically mirrored with `core/components/<package>/`.

## Related

- [Server Requirements](getting-started/server-requirements)
- [Hardening MODX](getting-started/maintenance/securing-modx) (block public access to `core/` and related paths)
- [Upgrading from 2.x to 3.0](getting-started/upgrading-to-3.0) (namespaces, processors, fixed core path)

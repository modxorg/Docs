---
title: "xPDO 3"
description: "Composer, PSR-4, and migrating custom models from MODX 2.x to MODX 3 / xPDO 3."
sortorder: 5
---

MODX 3 ships **xPDO 3** under `core/vendor/xpdo/` (Composer package `xpdo/xpdo`). The library no longer lives as loose files under `core/xpdo/`. Model classes use PHP namespaces and PSR-4 autoloading.

This page is the upgrade-oriented reference. For a full walkthrough that builds a new Extra from scratch, use [Using Custom Database Tables](extending-modx/tutorials/using-custom-database-tables). For API methods, start at [xPDO](extending-modx/xpdo).

## What changed for you

| Topic | MODX 2 / xPDO 2 | MODX 3 / xPDO 3 |
| --- | --- | --- |
| Where xPDO lives | `core/xpdo/` | `core/vendor/xpdo/` (bundled with the release) |
| Autoload | MODX / xPDO class loaders | Composer `autoload.php` + PSR-4 |
| Core models | `core/model/modx/*.class.php` | `core/src/Revolution/` under `MODX\Revolution\` |
| Schema `package` | Short package folder name (`modx`) | PHP namespace (`MODX\Revolution\`) |
| Base classes | `xPDOObject`, `xPDOSimpleObject` | `xPDO\Om\xPDOObject`, `xPDO\Om\xPDOSimpleObject` |
| Package metadata | `metadata.mysql.php` plus per-class maps under `mysql/` (schema `version` 1.x) | Same filename, but schema `version="3.0"` metadata with `namespace`, `namespacePrefix`, and a `class_map` for PSR-4 |
| `addPackage` | Path + package folder | Path + namespaced package + optional `$namespacePrefix` |

`modX` still extends `xPDO\xPDO`, so `$modx->getObject()`, `newQuery()`, and friends stay on the main MODX instance.

## Vendor layout and PSR-4

A normal download or Package Manager upgrade already includes `core/vendor/` and `core/vendor/autoload.php`. You do **not** need a project-level `composer.json` or a manual `composer install` to get xPDO 3. Setup and front controllers load that bundled autoloader. You do not `require` individual xPDO class files.

Composer matters if you develop from a Git checkout of Revolution, rebuild core models, or ship an Extra that manages its own Composer dependencies. Those workflows use the release `composer.json` (or the Extra’s) and write libraries into `core/vendor/`.

MODX core code maps through Composer as well (`"MODX\\": "core/src/"`). That is why the [core folder must stay at `/core/`](getting-started/upgrading-to-3.0/core-folder) in the project root.

## Core model layout

Schemas still live under `core/model/schema/` (for example `modx.mysql.schema.xml`). Generated classes and maps go to `core/src/`:

- Class: `core/src/Revolution/modResource.php` → `MODX\Revolution\modResource`
- Package metadata: `core/src/Revolution/metadata.mysql.php`
- Platform maps: `core/src/Revolution/mysql/*.php`

Core rebuild (Git / contributor workflow):

```bash
composer run-script parse-schema
```

That runs `core/vendor/bin/xpdo parse-schema` with `--psr4=MODX\\` into `core/src/`. Details: [Building model/schema](contribute/code/tooling/model).

## Loading an Extra package

Register a namespaced model from a component bootstrap (paths vary; `$namespace['path']` is the Extra core path):

```php
$modx->addPackage(
    'ToDo\\Model',
    $namespace['path'] . 'src/',
    null,
    'ToDo\\'
);
```

- First argument: PHP package / namespace segment that holds `metadata.{dbtype}.php`.
- Second: filesystem root for that PSR-4 prefix (often `.../src/`).
- Third: table prefix override, or `null` to use the site prefix.
- Fourth: `$namespacePrefix` so xPDO registers PSR-4 correctly when the package path is nested under that prefix.

After `addPackage` succeeds, use FQCNs:

```php
$item = $modx->newObject(\ToDo\Model\Task::class);
$item = $modx->getObject(\ToDo\Model\Task::class, $id);
```

See [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage) for prefix pitfalls.

## Schema and generated files

Minimal MODX 3 schema shape:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<model package="ToDo\Model" baseClass="xPDO\Om\xPDOObject" platform="mysql"
       defaultEngine="InnoDB" version="3.0">
    <object class="Task" table="todo_task" extends="xPDO\Om\xPDOSimpleObject">
        <field key="title" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
    </object>
</model>
```

Generate classes with your build script or the xPDO CLI (`core/vendor/bin/xpdo parse-schema ...`). Expect:

- `src/Model/Task.php` with `namespace ToDo\Model;`
- `src/Model/metadata.mysql.php` (`version` ≥ `3.0`, `namespace`, `namespacePrefix`, `class_map`)
- `src/Model/mysql/Task.php` (platform map)

MODX 2.x Extras already shipped a `metadata.mysql.php`. For MODX 3 regenerate it from a `version="3.0"` schema so it includes the namespace fields and `class_map`. A 2.x metadata file (or a layout that never got a 3.0 metadata rebuild) will not register PSR-4 the same way and can log a package metadata warning.

## Migrating a 2.x Extra model

Work through this checklist for each custom package:

1. **Move classes** into a `src/` tree that mirrors the PHP namespace (`MyExtra\Model\...`).
2. **Rewrite the schema**: set `package` to the PHP namespace, `version="3.0"`, and namespaced `extends` / relation `class` values (`xPDO\Om\...`, `MODX\Revolution\...` when you relate to core objects).
3. **Regenerate** maps and classes. Commit `metadata.mysql.php` and the `mysql/` maps your generator writes.
4. **Update `addPackage`** to the four-argument (or namespaced) form and load it from [`bootstrap.php`](extending-modx/namespaces) when the Extra boots.
5. **Replace string class keys** in PHP with `::class` or FQCNs in `getObject`, `newObject`, `newQuery`, processors, and vehicle attributes.
6. **Fix `instanceof` and type hints** to the namespaced classes. Short names like `modResource` or your old `MyObject` are not real PHP classes in 3.x.
7. **Drop** `require`/`include` of `xpdo.class.php` or per-class model files. Rely on the bundled vendor autoloader + `addPackage`.

### Before / after (core object)

```php
// MODX 2.x
$resource = $modx->getObject('modResource', $id);
if ($resource instanceof modResource) { /* ... */ }

// MODX 3.x
use MODX\Revolution\modResource;

$resource = $modx->getObject(modResource::class, $id);
if ($resource instanceof modResource) { /* ... */ }
```

`$modx->getObject('modResource', $id)` may still resolve through `loadClass` translation and log a deprecation. Prefer the namespaced form. `instanceof modResource` against the old global name is always false. Full alias table: [Changed Class Names](getting-started/upgrading-to-3.0/class-names).

### Before / after (custom package)

```php
// MODX 2.x
$modx->addPackage('myextra', MODX_CORE_PATH . 'components/myextra/model/');
$row = $modx->getObject('myExtraItem', $id);

// MODX 3.x
$modx->addPackage('MyExtra\\Model', MODX_CORE_PATH . 'components/myextra/src/', null, 'MyExtra\\');
$row = $modx->getObject(\MyExtra\Model\Item::class, $id);
```

## xPDO CLI

xPDO 3 exposes `core/vendor/bin/xpdo`. The core uses it from Composer scripts (`parse-schema`). Extras can call the same binary with their schema path and `--psr4=YourPrefix\\`. Wire it into the Extra’s own `composer.json` if you maintain the package with Composer.

## Related pages

- [Using Custom Database Tables](extending-modx/tutorials/using-custom-database-tables) — step-by-step Extra model
- [Changed Class Names](getting-started/upgrading-to-3.0/class-names) — aliases and `instanceof`
- [Core folder](getting-started/upgrading-to-3.0/core-folder) — why `/core/` is fixed
- [Directory structure](getting-started/directory-structure) — `vendor/` and `src/`
- [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage)
- [Building model/schema](contribute/code/tooling/model) — core schema rebuild

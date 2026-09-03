---
title: "Structure of the component"
translation: "extending-modx/creating-components"
---

All decent additions to MODX are distributed by transport packages - these are such zip files with a certain structure.

During installation, they can perform various actions: create tables, change system settings, copy files, etc.

To write a transport package from scratch is very long, dreary and fraught with errors. It is much better to use a proven preparation **modExtra** - it is with its help that almost all of my additions are written.

For MODX 2.x use [modx-pro/modExtra](https://github.com/modx-pro/modExtra). For MODX 3.x use [modx-pro/ModExtra3](https://github.com/modx-pro/ModExtra3). Layout of folders is the same idea. Download one scaffold and walk the tree below.

This page also covers the package builder: how it runs and how you configure it.

## Load modExtra

The scaffold lives on GitHub. Clone it (or download the zip), then copy the files into your project.

- Without Git: unpack the zip from [modExtra](https://github.com/modx-pro/modExtra/archive/master.zip) or [ModExtra3](https://github.com/modx-pro/ModExtra3/archive/master.zip)
- With Git:

```bash
git clone https://github.com/modx-pro/modExtra.git
# or: git clone https://github.com/modx-pro/ModExtra3.git
```

Remove the nested `.git` directory if you do not want the scaffold history. Copy the rest into the project path from the previous lesson. PhpStorm will index the files.

It should look like this:

![](/ru/extending-modx/creating-components/component-structure/structure-1.png)

test.php can be safely removed.

## Component structure

A regular package consists of 3 directories:

- `_build` — scripts to build the component into the transport package
- `assets` — files that must be accessible from outside
- `core` — files that are needed for the internal logic of the component
- `README.md` — The file with the general description of the component is needed for the future repository on GitHub
- `rename_it.php` — new script rename billet php
- `rename_it.sh` — old script rename perl

### Directory core

The most important component directory is the entire logic of its work.

This directory should be copied to the working site, so it looks like this:

``` plain
- core
-- components
--- component_name
---- everything is necessary here
```

That is, the directory structure is such that it is copied to the correct place `/core` of the site.

#### Main directories

- **controllers** — files for the preparation of admin pages. Download the necessary scripts and styles.
- **docs** — change history, instruction and license. These files are involved in the package description.
- **elements** — installable chunks, snippets and other possible inheritors of `modElement`
- **lexicon** — component dictionaries, usually only en and ru
- **model** — a directory with component objects and table models for databases, usually only for MySql. The main working class of the component is also located here.
- **processors** — files that perform some one small function. Serve, as a rule, for processing requests from the admin.
Please note that files that are in this directory cannot be accessed from outside. That is, you cannot store any scripts here that you want to access from the browser.

These are kernel files, and in MODX the core directory can be moved out of the site altogether, or even use one core for several installations.

If you need to open something from the browser, there are assets for this.

### Directory assets

Directory accessible from the browser for requests. Files are stored here `*.js, *.css and php-connectors` for their admin requests.

By default, the connector is only one; it is the one that the admin pages will access to perform some tasks.
There is nothing special to tell here, everything is clear.

### Directory `_build`

This tree never ships inside the transport zip. Its scripts *build* the zip. Current scaffolds ([modExtra](https://github.com/modx-pro/modExtra), [ModExtra3](https://github.com/modx-pro/ModExtra3)) use:

| Path | Role |
| --- | --- |
| `_build/build.php` | Build entry (CLI or browser) |
| `_build/config.inc.php` | Name, version, `'install'`, `'update'`, `'static'`, logging |
| `_build/elements/` | PHP arrays of menus, chunks, snippets, … |
| `_build/resolvers/` | PHP that runs on install / upgrade / uninstall |

Older course text still mentions `build.transport.php`, `build.config.php`, `BUILD_*` constants, and `_build/data/`. Those files are gone from the scaffolds above.

#### Configuration

`config.inc.php` returns an array. Useful keys:

- `name` / `name_lower` / `version` / `release`
- `'install' => true` builds and installs in one run
- `'update'`: per element type, whether to overwrite on package upgrade
- `'static'`: default static flag for plugins, snippets, chunks

You rarely edit `build.php`. Point the arrays, then run the script.

#### Elements

Each file in `_build/elements/` whose name does **not** start with `.` or `_` is loaded. The basename (without `.php`) must match a method on the build class (`menus`, `chunks`, `snippets`, …). To ship chunks, rename `_chunks.php` to `chunks.php` (and keep a matching method in `build.php` if you add a new type).

Example chunk list:

```php
return [
    'tpl.ModExtra.item' => [
        'file' => 'item', // core/components/<name>/elements/chunks/item.tpl
        'description' => '',
        // 'properties' => [...], // optional snippet/chunk properties
    ],
];
```

Other element types use the same idea: unique keys in the array, defaults filled in the build method, static/update taken from `config.inc.php`.

![](/ru/extending-modx/creating-components/component-structure/structure-2.png)

Snippet properties can live in the element array under `properties`. The old `_build/properties/` directory is not part of current modExtra / ModExtra3.

#### Resolvers

PHP under `_build/resolvers/`. Same rule: names starting with `.` or `_` are skipped. Active files run during package actions.

```php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */

if ($transport->xpdo) {
    $modx = $transport->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            // first install
            break;
        case xPDOTransport::ACTION_UPGRADE:
            // upgrade
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            // uninstall
            break;
    }
}

return true;
```

Typical ModExtra3 resolvers include `tables.php` (schema/tables) and `symlinks.php` (link `core` / `assets` back into `Extras/` for development).

## Conclusion

Configure the package in `_build/config.inc.php` and `_build/elements/`, add resolvers as needed, then run `_build/build.php`.

Next lesson: upload the scaffold, rename it to **Sendex**, tweak it, build, and install.

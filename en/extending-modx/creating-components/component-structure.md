---
title: "Structure of the component"
translation: "extending-modx/creating-components"
---

A MODX component ships as a transport package — a zip with a fixed layout. During installation it can create tables, change system settings, copy files, and more.

Building that zip from scratch is slow and error-prone. Use the **modExtra** scaffold instead — almost every add-on in the course starts from it.

For MODX 2.x take [modx-pro/modExtra](https://github.com/modx-pro/modExtra); for MODX 3.x — [modx-pro/ModExtra3](https://github.com/modx-pro/ModExtra3). The folder layout is the same. Pick one and follow the tree below.

This page also covers the package builder: how it runs and how you configure it.

## Load modExtra

The scaffold lives on GitHub. Clone it (or download the zip), then copy the files into your project.

- Without Git: unpack the zip from [modExtra](https://github.com/modx-pro/modExtra/archive/master.zip) or [ModExtra3](https://github.com/modx-pro/ModExtra3/archive/master.zip)
- With Git:

```bash
git clone https://github.com/modx-pro/modExtra.git
# or: git clone https://github.com/modx-pro/ModExtra3.git
```

Delete the nested `.git` directory if you do not need the scaffold history, then copy the rest into the project path from the previous lesson.

![](/ru/extending-modx/creating-components/component-structure/structure-1.png)

Remove `test.php` — it is not part of the component.

## Component structure

A regular package contains three directories and a few files:

- `_build` — scripts that build the transport package
- `assets` — files served to the browser
- `core` — the component's internal logic
- `README.md` — short description for the future GitHub repository
- `rename_it.php` — renames the scaffold to your component name
- `rename_it.sh` — the same rename script, older shell variant


### Directory core

`core` holds the component's logic. It is copied into the site's own `core` directory, so the paths line up:

``` plain
- core
-- components
--- component_name
---- everything is necessary here
```

Main directories:

- **controllers** — manager page controllers; they load the required CSS and JS.
- **docs** — changelog, readme and license; the package description uses them.
- **elements** — chunks, snippets and other `modElement` objects shipped with the component.
- **lexicon** — component lexicons, usually `en` and `ru`.
- **model** — objects and table models for the database. The component's main class lives here too.
- **processors** — small handlers for manager requests. Files here are not reachable from the browser; do not put anything that must run over HTTP into this directory.

In MODX the `core` directory can live outside the site root, and one `core` can serve several installations. Anything the browser must reach belongs in `assets`.

### Directory assets

Files open to the browser: `*.js`, `*.css` and the connector PHP file that manager pages call. The scaffold ships one connector; that is all the component needs.

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

You rarely edit `build.php`. Fill in the arrays, then run the script.

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

Next lesson: rename the scaffold to **Sendex**, upload it and make the first commit.

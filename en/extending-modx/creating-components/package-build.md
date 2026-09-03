---
title: "We assemble and install the first version of the package"
translation: "extending-modx/creating-components/package-build"
---

In the previous lesson we sketched the feature set, wrote a table schema, and generated an xPDO model for MySQL.

Today we build and install the first package version and look at how [Custom Manager Pages](extending-modx/custom-manager-pages) fit together.

## Build scripts (current modExtra)

The Sendex course originally used older filenames. Current scaffolds do **not** ship `build.transport.php` or `build.config.php`.

| MODX | Scaffold | Build entry | Config |
| --- | --- | --- | --- |
| 3.x | [modx-pro/ModExtra3](https://github.com/modx-pro/ModExtra3) | `_build/build.php` | `_build/config.inc.php` |
| 2.x | [modx-pro/modExtra](https://github.com/modx-pro/modExtra) | `_build/build.php` | `_build/config.inc.php` |

Both put the working copy under an `Extras/` directory at the site root, rename with `rename_it.php`, then build.

```bash
php ~/www/Extras/modExtra/rename_it.php Sendex
php ~/www/Extras/Sendex/_build/build.php
```

You can also open the build URL in a browser:

`https://your-dev-site/Extras/Sendex/_build/build.php`

Add `?download=1` to download the transport zip after the build.

In `config.inc.php`, auto-install is the `'install' => true` flag (not a `PKG_AUTO_INSTALL` constant):

```php
return [
    'name' => 'Sendex',
    'name_lower' => 'sendex',
    'version' => '1.0.0',
    'release' => 'pl',
    'install' => true,
    // ...
];
```

With `'install' => true`, the script builds the package and installs it into Package Management in one run. If install is `false`, open **Extras → Installer**, search locally, and install the zip yourself.

![](/ru/extending-modx/creating-components/package-build/package-build-1.png)

![](/ru/extending-modx/creating-components/package-build/package-build-2.png)

Element lists live under `_build/elements/` (for example `menus.php`, `snippets.php`). PHP files that do not start with `.` or `_` are picked up automatically. Resolvers live in `_build/resolvers/`. See [Component structure](extending-modx/creating-components/component-structure).

## Menu

In MODX 3, `modAction` is gone. A menu item is a `modMenu` whose `action` field is the controller name inside your namespace.

Current modExtra / ModExtra3 define menus in [`_build/elements/menus.php`](https://github.com/modx-pro/ModExtra3/blob/master/_build/elements/menus.php):

```php
return [
    'sendex' => [
        'description' => 'sendex_menu_desc',
        'action' => 'home',
        // 'parent' => 'components', // default in the build script
    ],
];
```

- `action` → controller file `core/components/sendex/controllers/home.class.php` (class like `SendexHomeManagerController`).
- `parent` → usually `components`. Leave empty for a top-level item that only opens a submenu.
- `handler` → optional JavaScript. Use `return false;` for a parent row that should not open a page.

Older Sendex commits still show `_build/data/transport.menu.php` with a nested `action` array for `modAction`. That pattern is historical. New work on MODX 3 should follow `menus.php` as above.

## Customization for development

The project directory (for example `Extras/Sendex`) is the working tree. After install, MODX also has copies under `core/components/sendex/` and `assets/components/sendex/`. Edits in `Extras/Sendex` do not change the installed files until you rebuild, unless you point the namespace at the project path.

Options:

1. Rebuild and reinstall after every change.
2. Point the namespace (and path settings) at `Extras/Sendex` so the manager loads PHP/JS from the project.

For option 2: **System → Namespaces**, open the `sendex` namespace, set its path to the project `core` path (the ModExtra3 `symlinks` resolver can also link `core` and `assets` back into `Extras/` for you).

![](/ru/extending-modx/creating-components/package-build/package-build-3.png)

Create system settings such as `sendex_core_path` and `sendex_assets_url` if your bootstrap still reads them (delete unused demo settings):

![](/ru/extending-modx/creating-components/package-build/package-build-4.png)

![](/ru/extending-modx/creating-components/package-build/package-build-5.png)

```php
$corePath = $this->modx->getOption(
    'sendex_core_path',
    $config,
    $this->modx->getOption('core_path') . 'components/sendex/'
);
$assetsUrl = $this->modx->getOption(
    'sendex_assets_url',
    $config,
    $this->modx->getOption('assets_url') . 'components/sendex/'
);
```

During development you may enable error display in the web root `index.php` and `manager/index.php` (hosting panels often hide notices). Keep that off on production.

## CMP controllers

When you click the menu item, MODX loads the controller named in `action` from the component's `controllers/` directory.

ModExtra3's home controller extends `MODX\Revolution\modExtraManagerController` and already uses `addCss()` / `addJavascript()` / `addHtml()`. See [`controllers/home.class.php`](https://github.com/modx-pro/ModExtra3/blob/master/core/components/modextra/controllers/home.class.php).

The Sendex lesson still walks an older chain (`index.class.php` → `SendexMainController` → `home.class.php`). The idea is the same: one entry controller loads component config and assets, then hands off to the page controller. You rarely need to change the entry file once paths are correct.

After a first install from the scaffold, open the CMP. Demo grids may error in the log until you replace processors. That is expected.

![](/ru/extending-modx/creating-components/package-build/package-build-6.png)

![](/ru/extending-modx/creating-components/package-build/package-build-7.png)

To verify that the namespace points at your project, temporarily add at the top of the active controller:

```php
echo 'Hello world';
die;
```

Save, reload the CMP. If you see the message, the manager is reading your working copy.

![](/ru/extending-modx/creating-components/package-build/package-build-8.png)

Rebuilding can reset namespace paths. Adjust the resolver or namespace after install if you rely on the `Extras/` tree. The Sendex history shows [installer tweaks for that](https://github.com/bezumkin/Sendex/commit/5416d620300261025420f9e73c41ee3a6fb9fd5a).

## Basic controller methods

Useful methods on the home controller:

### getPageTitle

Text for the manager page title (often a lexicon key).

![](/ru/extending-modx/creating-components/package-build/package-build-9.png)

### getTemplateFile

Returns a Smarty template path, or an empty string if you inject markup in the controller (ModExtra3 appends a `<div id="...">` in the controller and returns `''`).

### getLanguageTopics

Lexicon topics to load, for example `['sendex:default']`.

### checkPermissions

Return `true`/`false`, or rely on menu permission fields so only allowed users open the CMP.

![](/ru/extending-modx/creating-components/package-build/package-build-10.png)

### loadCustomCssJs

Registers CSS/JS for the page. This is where most CMP UI work happens.

## Conclusion

You can build and install from `_build/build.php`, with install controlled in `_build/config.inc.php`. Menus on MODX 3 are `modMenu` rows with a string `action`, not `modAction`. Point the namespace at `Extras/YourExtra` when you want live edits without constant rebuilds.

Next lesson: ExtJS UI for the CMP.

Track Sendex history on GitHub: [commit list](https://github.com/bezumkin/Sendex/commits/master). For new MODX 3 extras, start from [ModExtra3](https://github.com/modx-pro/ModExtra3).

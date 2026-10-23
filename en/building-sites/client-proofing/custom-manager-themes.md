---
title: "Custom Manager Themes"
description: "Override the files of the MODX Manager with a theme of your own: how the theme is chosen, what it has to contain, and how to override a single file or a controller."
---

> [!IMPORTANT]
> Check a custom manager theme after every upgrade of MODX. A theme can conflict with the changes of a new release, and the files that a release adds are never picked up by the theme.

## How a Theme Works

The manager is built on Smarty templates. The default theme's files live in `manager/templates/default`. The system setting `manager_theme` holds a directory name inside `manager/templates/`. The manager reads that theme's files first, and falls back to `default` for every file the theme does not have.

Only the `default` theme ships with MODX 3. Other themes come with a build, an extra, or your own files.

The theme covers more than the manager pages. Dashboard widget templates, TV templates, and Resource controllers are resolved from it as well.

## Overriding a Single File

To theme only the manager login page, copy the file:

`manager/templates/default/security/login.tpl` → `manager/templates/my-brand/security/login.tpl`

Then set `manager_theme` to `my-brand`. The file from `my-brand` wins over the file from `default`.

**Create the directory before you pick the theme**
The setting is a combo box that lists the directories of `manager/templates/`, and it cannot be typed by hand. Create `manager/templates/my-brand/` first, then pick it in **Admin → System Settings**.

## What a Theme Has to Carry

These files are read from the directory of the theme, with no fallback to `default`:

| File | What breaks without it |
| --- | --- |
| `images/modx-icon-color.svg` | The icon of the site in the header of the manager. |
| `images/modx-logo-color.svg` | The logo on the login page. |
| `images/login/default-background.jpg` | The background of the login page. |
| `email/default.tpl` | Creating a user: the template of the letter is not found. |

**The login page stylesheet is not themed**
`security/login.tpl` links the `default` theme's stylesheet by a fixed path. To theme it, put `css/login.css` into the theme directory and fix the link in your copy of `security/login.tpl`. The same holds for the file browser: its `browser/index.tpl` links the `default` theme's `css/index.css`.

The manager stylesheet is themed. Put `css/index.css` into the theme directory, and the header picks it up through the `{$indexCss}` placeholder.

## Where the Theme Has to Live

The theme directory is resolved inside `manager/templates/`, which is part of the installation and is overwritten by an update. Keep the theme files in a repository of your own and restore them after an update.

**An update from Evolution resets the theme**
When the installer upgrades a site from Evolution, `setup/includes/upgrade.install.php` sets `manager_theme` back to `default`. An update inside MODX 3 leaves the setting as it is.

## Overriding a Controller

A controller is overridden the same way, with `controllers` in place of `templates`. The file in the theme must have the same name as in `default` (`<action>.class.php`). The class inside it must be named `<Action>ManagerController` in the global namespace, for example `SecurityLoginManagerController`.

## See Also

1. [Client-proofing the manager](building-sites/client-proofing)
2. [Custom Manager Themes](building-sites/client-proofing/custom-manager-themes)
3. [Customizing the Login](building-sites/client-proofing/manager-login)
4. [Dashboards](building-sites/client-proofing/dashboards)

---
title: "Package Management"
description: "Transport packages in MODX: where they come from, how to install, update, uninstall and delete one, and the permissions, events and settings behind the page."
---

Package Management installs, updates and removes transport packages — zip archives with the code and the data of a Component.

## Where the Page Is

**Extras** in the top menu → **Installer**. The page has two tabs: **Packages** and **Providers**.

![](modx-package-management-1.jpg)

The manager checks that the extension cURL is loaded. Without it a notice is shown above the page, and the button **Download Extras** is replaced by the search of the local directory. See [cURL Is Missing](building-sites/extras/troubleshooting#curl-is-missing).

![](modx-package-management-2.jpg)

## Downloading a Package

The **Download Extras** button opens the Package Browser: the categories of the provider on the left, the packages on the right. The **Download** button of a row downloads that package into `core/packages/`.

![](modx-package-management-3.jpg)

The arrow next to the button opens a menu with three entries:

- **Select a Provider** — choose the provider to download from;
- **Search Locally for Packages** — look for the archives in `core/packages/`;
- **Upload a package** — send an archive to `core/packages/` from the computer.

## The Actions of a Package

Every row of the grid carries the actions of the package:

| Action | When it is there |
| --- | --- |
| **Install** | the package is not installed yet |
| **Uninstall** | the package is installed; the button rolls its elements back |
| **Reinstall** | the package is installed; the button runs the installation again over it |
| **Update** | the setting `auto_check_pkg_updates` is on and the provider has a newer version |
| **Check For Updates** | the package came from a provider and the setting `auto_check_pkg_updates` is off, so MODX does not know of a newer version yet |
| **Remove** | always |
| **View Details** | always |

![](modx-package-management-4.jpg)

The toolbar of the grid has one button that works on all the packages at once: **Purge Old Packages** removes the old versions of every package and keeps the installed one.

## Installing a Package

The **Install** button of a row in the grid of the **Packages** tab installs the package. Before the installation a panel opens with the tabs that the package carries: Changelog, Dependencies, Readme and License. Readme, Changelog and License are rendered as Markdown.

If the package carries pre-install options, they are asked for in the same panel. The installation itself runs in a console that reports every step.

A package that requires other packages shows the tab **Dependencies** in the same panel — see [Dependencies](#dependencies).

## Installing a Package From an Archive

A package can be installed from an archive on the server, without a provider:

1. put the file `<signature>.transport.zip` into `core/packages/`;
2. choose **Search Locally for Packages** in the menu of the **Download Extras** button;
3. the archive appears in the grid — install it as usual.

The directory `core/packages/` has to be writable by PHP.

The same archive can be sent through the manager. The entry **Upload a package** in the same menu takes only a zip whose name ends with `.transport.zip`. It asks for the file and puts it into `core/packages/`.

## Updating a Package

A package that came from a provider can be checked for a newer version: the **Check For Updates** button of the row opens a window with the versions the provider offers, and a newer version is installed from there.

With the setting `auto_check_pkg_updates` turned on, MODX asks the provider for the newest version itself. The button of the row is then **Update** when a newer version is there, and **Check For Updates** otherwise.

## Uninstalling a Package

The **Uninstall** button of the row rolls back the elements of the package. The window asks for one of three modes:

| Mode | What it does |
| --- | --- |
| **Preserve** | uninstalls the newer version and keeps the previous one, together with the settings and the values the component has added |
| **Uninstall** | uninstalls all versions of the package; they stay in the grid and can be installed again |
| **Restore** | restores the settings of the previous version as they were before the newer version was installed |

The archive, the unpacked directory and the record in the database stay in place.

## Removing a Package

The **Remove** button of the row deletes the package from the installation. The window **Delete Package** asks whether the package has to be uninstalled first — the option **Force Package Removal** deletes it either way.

The removal drops the archive `core/packages/<signature>.transport.zip`, the unpacked directory `core/packages/<signature>/` and the record of the database. The elements of the package are left where they are.

## The Card of a Package

The **View Details** button opens the card of the package: its signature, the provider it came from, the dates, the changelog, the readme and the license.

The grid of the **Packages** tab shows only the newest version of a package. The other versions are listed on the tab **Uploaded Versions** of the card, and a version can be deleted from it.

## Dependencies

The requirements are listed on the tab **Dependencies** of the pre-install panel, and the button **Install all dependencies to continue** installs them.

With the setting `abort_install_on_unsatisfied_dependency` — on by default — the installation is stopped until the dependencies are satisfied.

How a package declares its dependencies is described in [Package Dependencies](extending-modx/transport-packages/dependencies).

## Permissions

| Permission | What it opens |
| --- | --- |
| `workspaces` | the page of Package Management |
| `packages` | the processors of the packages |
| `providers` | the processors of the providers |
| `file_upload` | the upload of an archive |

All four are part of the Administrator policy.

## Events

| Event | When it fires |
| --- | --- |
| `OnPackageInstall` | a package is installed or upgraded |
| `OnPackageUninstall` | a package is uninstalled |
| `OnPackageRemove` | a package is removed or purged |

Every event carries the `package`. `OnPackageInstall` carries the `action` as well: `install` when the package is installed for the first time, `upgrade` when a newer version is installed over an older one.

## Settings

| Setting | Value by default | What it does |
| --- | --- | --- |
| [auto_check_pkg_updates](building-sites/settings/auto_check_pkg_updates) | `true` | the button of the row is **Update** instead of **Check For Updates** |
| [auto_check_pkg_updates_cache_expire](building-sites/settings/auto_check_pkg_updates_cache_expire) | 15 minutes | how long the result of the check is kept |
| [archive_with](building-sites/settings/archive_with) | `false` | `1` unpacks the archives with PCLZip instead of ZipArchive |
| `abort_install_on_unsatisfied_dependency` | `true` | the installation stops until the dependencies of the package are satisfied |

The option `default_provider` names the provider that is preselected. The page reads it, but it is not registered as a system setting — see [modxcms/revolution#17100](https://github.com/modxcms/revolution/issues/17100).

## Processors

| Processor | Permission |
| --- | --- |
| `Workspace/Packages/GetList` | `packages` |
| `Workspace/Packages/Get` | `packages` |
| `Workspace/Packages/GetAttribute` | `packages` |
| `Workspace/Packages/GetDependencies` | `packages` |
| `Workspace/Packages/Install` | `packages` |
| `Workspace/Packages/Uninstall` | `packages` |
| `Workspace/Packages/Remove` | `packages` |
| `Workspace/Packages/Update` | `packages` |
| `Workspace/Packages/CheckForUpdates` | `packages` |
| `Workspace/Packages/ScanLocal` | `packages` |
| `Workspace/Packages/Purge` | `packages` |
| `Workspace/Packages/Upload` | `file_upload` |
| `Workspace/Packages/Version/GetList` | `packages` |
| `Workspace/Packages/Version/Remove` | `packages` |
| `Workspace/Packages/Dependency/Download` | `packages` |
| `Workspace/Packages/Rest/GetList` | `packages` |
| `Workspace/Packages/Rest/GetNodes` | `packages` |
| `Workspace/Packages/Rest/GetInfo` | `packages` |
| `Workspace/Packages/Rest/Download` | `packages` |
| `Workspace/Providers/GetList` | `providers` |
| `Workspace/Providers/Create` | `providers` |
| `Workspace/Providers/Update` | `providers` |
| `Workspace/Providers/UpdateFromGrid` | `providers` |
| `Workspace/Providers/Remove` | `providers` |

## See Also

1. [Providers](building-sites/extras/providers)
2. [Troubleshooting Package Management](building-sites/extras/troubleshooting)
3. [Transport Packages](extending-modx/transport-packages)

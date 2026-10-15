---
title: "Transport Packages"
description: "A Transport Package is a collection of objects and files"
---

## What is a Transport Package?

A Transport Package carries objects and files from one MODX installation to another. It can hold database rows, files, and scripts that run during install — a whole 3rd-Party Component in one archive.

File names follow a versioned format that matches PHP version numbering:

> packagename-version-release.transport.zip

Uploading `myextra-1.0-rc2.transport.zip` over `myextra-1.0-rc1.transport.zip` tells MODX that it is the same package at a newer version, so it installs in upgrade mode.

### The Internals of a Transport Package

MODX unpacks every package into `core/packages/<name>`, using the zip file name without `.transport.zip`. The directory contains:

-   `manifest.php`
-   a subdirectory per Vehicle
-   `preserved.php`, if the package upgrades a previous one; it holds the install metadata to restore
-   `setup-options.php`, if the package included one

### The manifest.php file

`manifest.php` returns one array with the package metadata and file locations:

-   **manifest-version** — version of the manifest definition. MODX uses it to pick the right interpretation and stay compatible with future versions.
-   **manifest-attributes** — custom attributes set when the package was built. The usual ones are `license`, `readme` and `setup-options`, read during install.
-   **manifest-vehicles** — the metadata of every Vehicle, as an array.

### Okay, what are these Vehicles?

Vehicles are the parts of a Transport Package; a package holds as many as it needs. The available types:

-   xPDOObjectVehicle — database data
-   xPDOFileVehicle — files
-   xPDOScriptVehicle — a script to run; rare in component builds

In the `manifest-vehicles` array, each vehicle has these keys:

-   **vehicle_package** — package type that holds the vehicles. In MODX 3 packages the field is empty (`''`); the legacy value `'transport'` is written only for vehicle classes without a namespace.
-   **vehicle_class** — the Vehicle class name.
-   **class** — the class of the transported DB object, or `xPDOFileVehicle` for a file vehicle.
-   **guid** — random GUID of the vehicle.
-   **native_key** — for a database object, the primary key that identifies it.
-   **filename** — path of the vehicle's source file inside the package folder.
-   **namespace** — groups vehicles and objects so they stay unique within a MODX installation.

#### Inside a Vehicle's Source

A Vehicle groups several files; the manifest points at the main one, which usually ends in `.vehicle`.

The file returns an array with the manifest's keys plus some of its own. `xPDOFileVehicle` and `xPDOObjectVehicle` differ; the common keys:

-   **class** — the vehicle class type, as in the manifest.
-   **object** — object data: for DB objects a JSON representation of the table row; for files a PHP array with source, target and name.
-   **vehicle_class** — the vehicle class name, as in the manifest.
-   **vehicle_package** — the transport type, as in the manifest.
-   **guid** — the unique vehicle identifier, as in the manifest.
-   **package** — the package name of the transported object. Always empty (`''`) in MODX 3 packages, because modern vehicle classes are namespaced; `'modx'` appears only with legacy classes without a namespace.
-   **signature** — the filename signature of this vehicle.
-   **native_key** — for a database object, its primary key, as in the manifest.

Database vehicles (`xPDOObjectVehicle`) often carry extra keys. Build scripts set them with `xPDOTransport::*` constants; see [Creating a Build Script](extending-modx/transport-packages/build-script):

-   **preserve_keys** — when true, primary key values from the package are applied on load. Use it for natural or string keys (a Context `key`). For autoincrement IDs leave it false so the database assigns a new ID.
-   **update_object** — when true, an existing row that matches the unique key is updated; when false, it is skipped. Uninstall follows the same flag: xPDO removes the object only when update is allowed and **uninstall_object** is not false.
-   **uninstall_object** — when false, the object stays in the database after uninstall (default: true). Removal still requires **update_object**.
-   **unique_key** — the column that identifies the database object. Often not the primary key, because auto-increment values rarely match across databases.
-   **preexisting_mode** — how objects that already exist on the site are handled (`preserve_preexisting`, `remove_preexisting`, `restore_preexisting`). Set it on the vehicle or pass it at install/uninstall; details are in the [build script tutorial](extending-modx/transport-packages/build-script).
-   **abort_install_on_vehicle_fail** — when true and this vehicle fails to install, the package install stops.
-   **resolve_files** / **resolve_files_remove** / **resolve_php** — turn file and PHP resolvers on or off, and whether file resolvers delete their targets on uninstall.
-   **install_files** / **uninstall_files** — for `xPDOFileVehicle`: skip copying files on install, or keep files on uninstall.
-   **related_objects** — an array of objects related to the vehicle's main database object — for example, Snippets added to a packaged Category.
-   **related_object_attributes** — attributes for those related objects.
-   **namespace** — grouping value for the objects in the package, as in the manifest.

Optional keys:

-   **validate** — validators for this vehicle.
-   **resolve** — resolvers for this vehicle.

For `xPDOFileVehicle`, a directory named after the vehicle (minus `.vehicle`) holds its files.

## Resolvers and Validators

Validators and resolvers bracket a Vehicle's processing: validators run before, resolvers after. In the package, each file is named after its vehicle and its source file — `{signature}.{source name without .php}.resolver`, or the same scheme with `.validator` at the end. A resolver built from `setupoptions.resolver.php` ends up as `{signature}.setupoptions.resolver.resolver`. The doubled `.resolver` is not a typo: the scheme appends its suffix to whatever the source file is called.

### A Validator

A validator runs _before_ the Vehicle is installed, upgraded or uninstalled. Returning false blocks that action for the Vehicle. Two caveats:

-   a validator that returns false also blocks **uninstall**: the package install or uninstall fails for that vehicle, not only for install;
-   validators attached to related (child) objects are skipped — during the related-objects walk only the parent vehicle's validators run.

A PHP validator can return false without writing an error to the log: set `'silent_fail' => true` in its file metadata array.

### A Resolver

A resolver runs _after_ the Vehicle is installed, upgraded or uninstalled, and every resolver runs regardless of the results of the others. Resolvers clean up after the install or apply configuration, such as values entered in Setup Options.

## Usage

Packages are managed in the Package Management section of the Revolution manager. Add a package by either:

1.  Uploading the file to `core/packages/`, then clicking "Add New Package" and selecting the "Search Locally for Packages" option
2.  Downloading it from a [Transport Provider](building-sites/extras/providers "Providers")

To install, right-click the package in the grid and click Install. The dialog may ask for the license and show the README, then offers pre-installation options when the package defines them.

If the package declares [dependencies](extending-modx/transport-packages/dependencies) in its `requires` attribute, the dialog gains a **Dependencies** tab with every requirement and its status: installed or downloadable. The **Install** and **Setup Options** buttons stay disabled until every requirement is met.

You can uninstall a package at any time, and a package fetched from a [Transport Provider](building-sites/extras/providers "Providers") can be checked for updates.

## Package Events

The Package Management processors fire events your plugins can listen to:

| Event                | When                                                                     | Arguments                                                                                                                                                                             |
| -------------------- | ------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **OnPackageInstall** | after a package is installed                                             | `package` (the `modTransportPackage` object), `action` (`xPDOTransport::ACTION_INSTALL` or `xPDOTransport::ACTION_UPGRADE`, depending on whether a previous version was present)       |
| **OnPackageUninstall** | after a package is uninstalled                                          | `package`                                                                                                                                                                             |
| **OnPackageRemove**  | when the package is removed from the workspace (Remove and Purge processors) | `package`                                                                                                                                                                        |

## Related Pages

-   [Providers](building-sites/extras/providers "Providers")
-   Tutorial: [Creating a Build Script](extending-modx/transport-packages/build-script "Creating a Build Script")

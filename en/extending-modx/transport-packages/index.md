---
title: "Transport Packages"
_old_id: "308"
_old_uri: "2.x/developing-in-modx/advanced-development/package-management/transport-packages"
---

## What is a Transport Package?

A Transport Package is a collection of objects and files that can be used to "transport" data from one MODX installation to another; or even to transport 3rd-Party Components in a simple, easily-manageable format. In other words, Transport Packages can transport nearly _anything_ - from database data, files and even scripts to run during its install.

Transport Packages also allow for versioning, in that they match based on a simple format, complying with PHP version number standards:

> packagename-version-release.transport.zip

So, an example Transport Package might be "myextra-1.0-rc1.transport.zip". If you were to upload a "myextra-1.0-rc2.transport.zip", MODX would then interpret this as part of the same "package" but a newer version of it. It would then behave in "upgrade" mode.

Transport packages are stored in .zip files, ending with ".transport.zip". They can be uploaded and installed anywhere there is a MODX Revolution instance - regardless of the server configuration.

### The Internals of a Transport Package

MODX Revolution automatically "unpacks", or unzips, your transport packages for you. Once done, a subdirectory in your _core/packages_ directory will appear with the name of the zip file (minus ".transport.zip"). This directory will contain:

-   A manifest.php file
-   Subdirectories of each Vehicle (more on those later)

It may also contain a "preserved.php" file, if the package is an upgrade from a prior package, which contains the metadata for the install to be restored. And finally, there might be a 'setup-options.php' file if the package has packaged one inside.

### The manifest.php file

The manifest basically stores all the relevant information for the package, including the locations of files and information about them. If you open the manifest.php file, you'll see that it contains a giant PHP array being returned. Within that are some keys you might be interested in:

-   **manifest-version** - This tells us what version the manifest definition is. MODX uses it to determine how to interpret the manifest and make it easier for future MODX versions to be backwards-compatible.

-   **manifest-attributes** - These are any custom attributes that were set on the package when it was being built. The most common are 'license', 'readme' and 'setup-options', which MODX interprets during install time.

-   **manifest-vehicles** - These are the Vehicles metadata, in array format.

### Okay, what are these Vehicles?

Transport Vehicles are the parts of a Transport Package. A package can contain as many Vehicles as it likes. Vehicles also come in different types; the currently available ones are:

-   xPDOObjectVehicle - For transporting database data
-   xPDOFileVehicle - For transporting files

In the 'manifest-vehicles' array, you'll see these keys for each vehicle:

-   **vehicle_package** - This tells us what type of package is holding these vehicles. Currently the only type is 'transport'.
-   **vehicle_class** - The class name of the type of Vehicle this is.
-   **class** - The class name of the DB object being transported, or xPDOFileVehicle if it's a file vehicle.
-   **guid** - A randomly generated GUID for the vehicle.
-   **native_key** - If the vehicle is a database object, this will be its primary key by which it is identified.
-   **filename** - Where the vehicle's source file can be found within the transport package's folder.
-   **namespace** - Certain packages use the 'namespace' field to group vehicles and other objects to make them uniquely identifiable within a MODX installation.

So now that we've seen what the vehicles represent in the manifest, let's open up a Vehicle by looking a filename and diving in.

#### Inside a Vehicle's Source

Vehicles can actually have a few different files grouped with them, but we'll first concern ourselves with the main vehicle file, which is specified in the manifest and often ends with '.vehicle'.

Again, it looks like a big PHP array, with similar keys. It has some extra keys though, which are important. `xPDOFileVehicle` and `xPDOObjectVehicle` can have different keys. Let's go over the common ones:

-   **class** - Similar to the manifest, the class type of the vehicle.
-   **object** - An array that contains the object information. For DB objects this will most likely be a JSON array representation of the DB table. For files, it will be a PHP array with the source, target and name of the vehicle.
-   **vehicle_class** - Similar to the manifest, the class name of the vehicle.
-   **vehicle_package** - Similar to the manifest, the transport type of the vehicle.
-   **guid** - Similar to the manifest, a unique identifier for the vehicle.
-   **package** - Only applicable to xPDOObjectVehicles, this will most likely be 'modx' or blank.
-   **signature** - The filename signature for this vehicle.
-   **native_key** - Similar to the manifest. If the vehicle is a database object, this will be its primary key by which it is identified.

The xPDOObjectVehicle, or database vehicles, often have these extra keys:

-   **preserve_keys** - If true, the vehicle will try and preserve the primary key of the database record on install.
-   **update_object** - If true, the vehicle will UPDATE the object if it's found already in the database during install. If false, it will be skipped.
-   **unique_key** - The column name by which the database object can be uniquely identified - often this is not the primary key, as auto-incrementing fields often do not match across different databases.
-   **related_objects** - A complex array of any related objects to this vehicle's main database object. Sometimes, it may be necessary to package in "related" objects to achieve the desired end result. A great example is if the packager wants to put all of his Snippets in a Category. He would make the vehicle's object be the Category, and then add related objects - the snippets - to it.
-   **related_object_attributes** - The attributes for the above related objects.
-   **namespace** - Similar to the manifest; a grouping value for the objects in a transport package.

There are also some optional ones, which may or may not be set:

-   **validate** - An array of arrays which contain validators, explained later.
-   **resolve** - An array of arrays which contain resolvers, explained later.

In xPDOFileVehicles, you will also see a directory with the same filename as the vehicle, minus the ".vehicle". If you open it, there will be the files for the vehicle.

## Resolvers and Validators

What are resolvers and validators? Well, think of them like pre and post installation scripts. They are, in essence, PHP scripts. (In fact, if you open them up, they look exactly like PHP scripts.) They are named the same filename as the vehicle, but are postfixed with ".resolver" or ".validator".

### A Validator

A validator is executed _before_ the Vehicle is installed, upgraded or uninstalled. If they return false, the Vehicle is not installed, and is skipped.

They are useful for determining whether or not the Vehicle should still be installed, uninstalled or upgraded in the package process. For example - if you want to have dependencies and not have a Vehicle installed unless something else is found, a Validator would be a great place for it.

### A Resolver

Resolvers are executed _after_ the Vehicle is installed, upgraded or uninstalled. Each will execute in turn regardless of any other resolver results.

Resolvers are useful for 'cleaning up' after a Vehicle is installed, or setting custom configuration options (such as ones setup in Setup Options during install).

## Usage

Transport Packages can be managed in the [Package Management](extending-modx/transport-packages "Package Management") section of the Revolution manager. They can be added to the Revolution instance by either:

1. Uploading the file manually to core/packages/, and then clicking "Add New Package" and selecting the "Search Locally for Packages" option
2. Downloading the package from a [Transport Provider](building-sites/extras/providers "Providers"). This allows updates to be remotely downloaded for a package as well.

Once downloaded, they can be installed by right-clicking a package in the grid, and clicking Install. This will prompt the user to accept a License Agreement should the package come with one, and prompting to read the README should the package contain one. Then it will present a form with pre-installation options, which may or may not exist depending on the package. The user can then click 'Install' to install the package.

Once installed, the user can uninstall the package at any time. Also, if the package was downloaded from a [Transport Provider](building-sites/extras/providers "Providers"), then the user can check for updates for the package.

## Related Pages

-   [Package Management](extending-modx/transport-packages "Package Management")
-   [Providers](building-sites/extras/providers "Providers")
-   Tutorial: [Creating a 3rd Party Component Build Script](extending-modx/transport-packages/build-script "Creating a 3rd Party Component Build Script")

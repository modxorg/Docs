---
title: "OnPackageUninstall"
_old_id: "1760"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpackageuninstall"
---

Fired after a package is successfully uninstalled via the package manager. Added in MODX Revolution 2.6.

## Available Variables

- `$package`: the modTransportPackage instance that was installed. For example `$package->get('package_name')` to get the name of the package.
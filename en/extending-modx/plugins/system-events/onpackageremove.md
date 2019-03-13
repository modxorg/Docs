---
title: "OnPackageRemove"
_old_id: "1761"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpackageremove"
---

Fired after a package is successfully removed via the package manager. Added in MODX Revolution 2.6.

## Available Variables

- `$package`: the modTransportPackage instance that was removed. For example `$package->get('package_name')` to get the name of the package. Note that the package object will have been removed from the database at this point. While the data is available to you, you should not rely on it being in the database.
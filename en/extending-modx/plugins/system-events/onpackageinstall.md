---
title: "OnPackageInstall"
_old_id: "1759"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpackageinstall"
---

Fired after a package is successfully installed via the package manager. Added in MODX Revolution 2.6.

## Available Variables

- `$package`: the modTransportPackage instance that was installed. For example `$package->get('package_name')` to get the name of the package.
- `$action`: one of `xPDOTransport::ACTION_UPGRADE` or `xPDOTransport::ACTION_INSTALL` to indicate if it was the first install, or an upgrade.
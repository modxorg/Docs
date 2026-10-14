---
title: "OnPackageInstall"
description: "Fires after a package is successfully installed or upgraded via the package manager."
---

## Event: OnPackageInstall

Fires after a package is successfully installed or upgraded via the package manager.

- Service: 2 - Manager Access Events
- Group: Package Manager

## Event Parameters

| Name    | Description                                                                                                                              |
| ------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| package | A reference to the modTransportPackage instance that was installed. Use `$package->get('package_name')` to get the name of the package. |
| action  | One of `xPDOTransport::ACTION_UPGRADE` or `xPDOTransport::ACTION_INSTALL`, indicating whether it was an upgrade or a first install.      |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnResourceGroupBeforeRemove"
description: "Registered as a core system event, but never invoked in MODX 3.x."
_old_id: "455"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforeremove"
---

## Event: OnResourceGroupBeforeRemove

This event is registered in the core system event list, but it is never invoked anywhere in the MODX 3.x code base. The event that actually fires right before a Resource Group is removed is [OnBeforeResourceGroupRemove](extending-modx/plugins/system-events/onbeforeresourcegroupremove), called from `modResourceGroup::remove()` with the `resourceGroup` and `ancestors` parameters. Register your plugin to that event instead — `OnResourceGroupBeforeRemove` will not run.

- Service: 1 - Parser Service Events
- Group: Security

## See Also

- [OnBeforeResourceGroupRemove](extending-modx/plugins/system-events/onbeforeresourcegroupremove)
- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

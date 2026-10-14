---
title: "OnPluginRemove"
description: "Fires just after the Plugin is removed from the database."
_old_id: "449"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onpluginremove"
---

## Event: OnPluginRemove

Fires just after the Plugin is removed from the database.

- Service: 1 - Parser Service Events
- Group: Plugins

## Event Parameters

| Name      | Description                                             |
| --------- | ------------------------------------------------------- |
| plugin    | A reference to the modPlugin object.                    |
| ancestors | An array of ancestors for the remove cascade operation. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

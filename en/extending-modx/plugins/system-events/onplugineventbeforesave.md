---
title: "OnPluginEventBeforeSave"
description: "Fires right before a Plugin-Event binding is saved."
---

## Event: OnPluginEventBeforeSave

Fires right before a Plugin-Event binding is saved.

- Service: 1 - Parser Service Events
- Group: Plugin Events

## Event Parameters

| Name        | Description                                                                                                                          |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------ |
| mode        | Either 'new' (`modSystemEvent::MODE_NEW`) or 'upd' (`modSystemEvent::MODE_UPD`), depending on whether the object is new or existing. |
| pluginEvent | A reference to the modPluginEvent object.                                                                                            |
| cacheFlag   | The cache flag passed to the save operation.                                                                                         |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

---
title: "OnBeforeTempFormDelete"
description: "Fires before a Template is deleted in the Manager."
_old_id: "391"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforetempformdelete"
---

## Event: OnBeforeTempFormDelete

Fires before a Template is deleted in the Manager.

- Service: 1 - Parser Service Events
- Group: Templates

## Event Parameters

| Name     | Description                                           |
| -------- | ----------------------------------------------------- |
| template | A reference to the modTemplate object.                |
| id       | The ID of the Template.                               |
| object   | Alias of `template` — a reference to the same object. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

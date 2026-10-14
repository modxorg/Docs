---
title: "OnFileCreateFormPrerender"
description: "Fires before the create file form is rendered in the manager."
---

## Event: OnFileCreateFormPrerender

Fires before the create file form is rendered in the manager.

- Service: 1 - Parser Service Events
- Group: System

## Event Parameters

| Name      | Description                                            |
| --------- | ------------------------------------------------------ |
| mode      | Always 'new' (`modSystemEvent::MODE_NEW`).               |
| directory | The directory the new file will be created in.         |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

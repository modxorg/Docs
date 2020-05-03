---
title: "OnDocPublished"
_old_id: "423"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocpublished"
---

## Event: OnDocPublished

Called when a Resource is published via the Publish context menu.

- Service: 5 - Template Service Events
- Group: None

## Event Parameters

| Name     | Description                                            |
| -------- | ------------------------------------------------------ |
| docid    | The ID of the resource being published. (deprecated)   |
| id       | The ID of the resource being published.                |
| resource | A reference to the modResource object being published. |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

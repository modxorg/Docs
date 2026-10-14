---
title: "OnSnipFormDelete"
description: "Fires after a Snippet is deleted in the Manager."
---

## Event: OnSnipFormDelete

Fires after a Snippet is deleted in the Manager.

- Service: 1 - Parser Service Events
- Group: Snippets

## Event Parameters

| Name    | Description                             |
| ------- | --------------------------------------- |
| id      | The ID of the deleted Snippet.          |
| snippet | A reference to the modSnippet object.   |
| object  | Alias of `snippet` — a reference to the same object. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

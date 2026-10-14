---
title: "OnSnipFormSave"
description: "Fires after a Snippet is created or updated in the Manager."
---

## Event: OnSnipFormSave

Fires after a Snippet is created or updated in the Manager.

- Service: 1 - Parser Service Events
- Group: Snippets

## Event Parameters

| Name    | Description                                                      |
| ------- | ---------------------------------------------------------------- |
| mode    | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| id      | The ID of the Snippet.                                           |
| snippet | A reference to the modSnippet object.                            |
| object  | Alias of `snippet` — a reference to the same object.             |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

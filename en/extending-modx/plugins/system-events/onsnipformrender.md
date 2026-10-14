---
title: "OnSnipFormRender"
description: "Fires in the Snippet create/update controller while the page placeholders are built; the returned output is assigned to the JavaScript variable MODx.onSnipFormRender."
---

## Event: OnSnipFormRender

Fires in the Snippet create/update controller while the page placeholders are built. The returned output is assigned to the JavaScript variable `MODx.onSnipFormRender`.

- Service: 1 - Parser Service Events
- Group: Snippets

## Event Parameters

| Name    | Description                                                                       |
| ------- | --------------------------------------------------------------------------------- |
| mode    | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`).                   |
| id      | The ID of the Snippet. This will be 0 for new Snippets.                           |
| snippet | A reference to the modSnippet object. Not passed when creating a new Snippet.     |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

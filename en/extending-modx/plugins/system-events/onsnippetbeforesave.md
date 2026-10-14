---
title: "OnSnippetBeforeSave"
description: "Fires right before a Snippet is saved, in modSnippet::save()."
---

## Event: OnSnippetBeforeSave

Fires right before a Snippet is saved, in `modSnippet::save()`.

- Service: 1 - Parser Service Events
- Group: Snippets

## Event Parameters

| Name      | Description                                                      |
| --------- | ---------------------------------------------------------------- |
| mode      | Either `new` or `upd` (`modSystemEvent::MODE_NEW` / `MODE_UPD`). |
| snippet   | A reference to the modSnippet object.                            |
| cacheFlag | The `cacheFlag` argument passed to the `save()` method.          |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

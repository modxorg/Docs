---
title: "OnSnippetBeforeRemove"
description: "Fires right before a Snippet is removed, in modSnippet::remove()."
---

## Event: OnSnippetBeforeRemove

Fires right before a Snippet is removed, in `modSnippet::remove()`.

- Service: 1 - Parser Service Events
- Group: Snippets

## Event Parameters

| Name      | Description                                             |
| --------- | ------------------------------------------------------- |
| snippet   | A reference to the modSnippet object.                   |
| ancestors | An array of ancestors passed to the `remove()` method.  |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

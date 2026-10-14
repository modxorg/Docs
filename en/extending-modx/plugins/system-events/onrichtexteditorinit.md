---
title: "OnRichTextEditorInit"
description: "Fires when a rich text editor is initialized, so Plugins can load the RTE."
_old_id: "460"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit"
---

## Event: OnRichTextEditorInit

Fires when a rich text editor is initialized, so Plugins can load the RTE.

- Service: 1 - Parser Service Events
- Group: RichText Editor


## Event Parameters

From the Resource editing controller:

| Name     | Description                                                      |
| -------- | ---------------------------------------------------------------- |
| editor   | The editor the user wants to use.                                |
| elements | An array of elements to transform into an RTE.                   |
| id       | The ID of the Resource (empty for a new Resource).               |
| resource | A reference to the Resource object.                              |
| mode     | Either `new` or `upd`, depending on whether the Resource is new. |

From the Chunk create/update controllers — the `editor` key is **not** passed; only `elements` and `mode` are sent. The update controller also passes `chunk`, a reference to the Chunk being edited.


Passed when the event fires from the TV richtext output renderer on the front end:

| Name        | Description                                                   |
| ----------- | ------------------------------------------------------------- |
| forfrontend | Load the RTE in the front-end context instead of the Manager. |
| width       | The requested width of the RTE.                               |
| height      | The requested height of the RTE.                              |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

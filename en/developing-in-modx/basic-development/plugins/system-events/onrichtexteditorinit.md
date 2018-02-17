---
title: "OnRichTextEditorInit"
_old_id: "460"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit"
---

## Event: OnRichTextEditorInit

Renders anytime a Richtext Editor could be used.

Service: 1 - Parser Service Events 
Group: Richtext Editor

## Event Parameters

NameDescriptioneditorThe specified editor that the user wants to use.elementsAn array of elements to transform into an RTE.Other properties might be passed, such as:

forfrontendIf passed, this will indicate to the plugin that this is to be loaded in a front-end context, not the manager.widthThe requested width of the RTE.heightThe requested height of the RTE.## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
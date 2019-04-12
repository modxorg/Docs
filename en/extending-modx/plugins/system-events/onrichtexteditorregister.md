---
title: "OnRichTextEditorRegister"
_old_id: "461"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorregister"
---

## Event: OnRichTextEditorRegister

Renders during any dropdown or select for available richtext editors for MODx.

If you are developing a custom RTE, simply return the name of the RTE that you are developing. This will then be matched to the System Setting 'which\_editor', which will allow users to select your RTE to use.

Service: 1 - Parser Service Events
Group: Richtext Editor

## Event Parameters

None.

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

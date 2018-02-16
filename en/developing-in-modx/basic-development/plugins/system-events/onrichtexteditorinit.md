---
title: "OnRichTextEditorInit"
_old_id: "460"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onrichtexteditorinit"
---

Event: OnRichTextEditorInit
---------------------------

Renders anytime a Richtext Editor could be used.

Service: 1 - Parser Service Events   
Group: Richtext Editor

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>editor</td><td>The specified editor that the user wants to use.</td></tr><tr><td>elements</td><td>An array of elements to transform into an RTE.</td></tr></tbody></table>Other properties might be passed, such as:

<table><tbody><tr><td>forfrontend</td><td>If passed, this will indicate to the plugin that this is to be loaded in a front-end context, not the manager.</td></tr><tr><td>width</td><td>The requested width of the RTE.</td></tr><tr><td>height</td><td>The requested height of the RTE.</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
---
title: "OnRichTextBrowserInit"
description: "Fires when the MODX Browser is initialized for a custom RTE, letting plugins return a JavaScript callback for the selected file."
_old_id: "459"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onrichtextbrowserinit"
---

## Event: OnRichTextBrowserInit

Fires when the MODX Browser is initialized for a custom RTE. Return a JavaScript function that receives the URL of the file selected in `MODX.Browser`. Combined plugin return values go into the `rtecallback` page placeholder.

- Service: 1 - Parser Service Events
- Group: RichText Editor

## Event Parameters

Request properties of the browser controller; at minimum:

| Name   | Description                                                  |
| ------ | ------------------------------------------------------------ |
| ctx    | The context key the browser operates in (defaults to `web`). |
| source | The Media Source ID to browse.                               |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

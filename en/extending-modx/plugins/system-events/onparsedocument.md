---
title: "OnParseDocument"
description: "Fires each time the Element tags are parsed."
_old_id: "441"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onparsedocument"
---

## Event: OnParseDocument

Fires each time the Element tags are parsed. This can happen many times during the loading of a Resource.

- Service: 5 - Template Service Events
- Group: System

## Event Parameters

| Name    | Description                                                                                          |
| ------- | ---------------------------------------------------------------------------------------------------- |
| content | The document content being parsed, passed by reference. Also available as `$modx->documentOutput`. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

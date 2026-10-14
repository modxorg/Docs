---
title: "OnResourceAutoPublish"
description: "Fires immediately after auto-publishing."
---

## Event: OnResourceAutoPublish

Fires immediately after auto-publishing.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name    | Description                                                                                                                                                                                                                                   |
| ------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| results | An array of auto-publishing results: `published` and `unpublished` (number of Resources affected), `published_resources` and `unpublished_resources` (arrays of Resource rows), and `errors`. Only fires if at least one Resource changed state. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

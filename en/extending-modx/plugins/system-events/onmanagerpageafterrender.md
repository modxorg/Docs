---
title: "OnManagerPageAfterRender"
description: "Fires in the manager controller after content is processed, right before the response is returned."
_old_id: "436"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender"
---

## Event: OnManagerPageAfterRender

Fires in the manager controller after content is processed and right before the response is returned — the last event of the manager page load.

- Service: 2 - Manager Access Events
- Group: System

## Event Parameters

| Name       | Description                                        |
| ---------- | -------------------------------------------------- |
| controller | The current manager page controller.                                          |

## Remarks

| Previous event | [OnManagerPageBeforeRender](extending-modx/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")                            |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | —                                                                                                                                                 |
| File           | [core/src/Revolution/modManagerController.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modManagerController.php) |
| Class          | abstract class `modManagerController`                                                                                                                |
| Method         | public function render()                                                                                                                           |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

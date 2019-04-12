---
title: "OnManagerPageBeforeRender"
_old_id: "437"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender"
---

## Event: OnManagerPageBeforeRender

Fired in the manager controller, before the processing of content.

Service: 2 - Manager Access Events
Group: System

## Event Parameters

| Name       | Description                                        |
| ---------- | -------------------------------------------------- |
| controller | The instance of current manager page's controller. |

## Remarks

| Previous event | [OnBeforeManagerPageInit](extending-modx/plugins/system-events/onbeforemanagerpageinit "OnBeforeManagerPageInit")                                  |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnManagerPageAfterRender](extending-modx/plugins/system-events/onmanagerpageafterrender "OnManagerPageAfterRender")                               |
| File           | [core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php) |
| Class          | abstract class modManagerController                                                                                                                |
| Method         | public function render()                                                                                                                           |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

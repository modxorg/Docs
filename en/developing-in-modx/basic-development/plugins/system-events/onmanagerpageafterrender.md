---
title: "OnManagerPageAfterRender"
_old_id: "436"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmanagerpageafterrender"
---

## Event: OnManagerPageAfterRender

Fired in the manager controller, after the processing of content and before returning it. The last event before getting response.

Service: 2 - Manager Access Events 
Group: System

## Event Parameters

NameDescriptioncontrollerThe instance of current manager page's controller.## Remarks

Previous event[OnManagerPageBeforeRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender")Next event—File[core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php)Classabstract class modManagerControllerMethodpublic function render()## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
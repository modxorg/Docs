---
title: "OnBeforeManagerPageInit"
_old_id: "385"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforemanagerpageinit"
---

## Event: OnBeforeManagerPageInit

Loaded right before a manager controller is run and after checking permissions.

Service: 2 - Manager Access Events 
Group: System

## Event Parameters

| Name | Description |
|------|-------------|
| action | The config array of current manager controller. |
| filename | The filename of the controller being loaded. (**Deprecated since 2.2**) |
## Remarks

| Previous event | [OnManagerPageInit](developing-in-modx/basic-development/plugins/system-events/onmanagerpageinit "OnManagerPageInit") |
|----------------|---------------------------------------------------------------------------------------------------------------------------------------|
| Next event | [OnManagerPageBeforeRender](developing-in-modx/basic-development/plugins/system-events/onmanagerpagebeforerender "OnManagerPageBeforeRender") |
| File | [core/model/modx/modmanagercontroller.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modmanagercontroller.class.php) |
| Class | abstract class modManagerController |
| Method | public function render() |
## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
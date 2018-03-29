---
title: "OnTemplateVarRemove"
_old_id: "466"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarremove"
---

## Event: OnTemplateVarRemove

Loaded right after successful removing a template variable.

Service: 1 - Parser Service Events 
Group: Template Variables

## Event Parameters

| Name | Description |
|------|-------------|
| templateVar | The instance of modTemplateVar class. |
| cacheFlag | Indicates if the saved TV should be cached and optionally, by specifying an integer value, for how many seconds before expiring. Returns always 'true' |
## Remarks

| Previous event | [OnTemplateVarBeforeRemove](developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforeremove "OnTemplateVarBeforeRemove") |
|----------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Next event | — |
| File | [core/model/modx/modtemplatevar.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modtemplatevar.class.php) |
| Class | modTemplateVar |
| Method | public function remove(array $ancestors= array ()) |
## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
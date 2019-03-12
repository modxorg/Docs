---
title: "OnTemplateVarBeforeSave"
_old_id: "465"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforesave"
---

## Event: OnTemplateVarBeforeSave

Loaded right before saving a template variable to database.

Service: 1 - Parser Service Events 
Group: Template Variables

## Event Parameters

| Name        | Description                                                                                                                      |
| ----------- | -------------------------------------------------------------------------------------------------------------------------------- |
| mode        | Either 'new' or 'upd', depending on the circumstances.                                                                           |
| templateVar | The instance of modTemplateVar class.                                                                                            |
| cacheFlag   | Indicates if the saved TV should be cached and optionally, by specifying an integer value, for how many seconds before expiring. |

## Remarks

| Previous event | —                                                                                                                                     |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnTemplateVarSave](developing-in-modx/basic-development/plugins/system-events/ontemplatevarsave "OnTemplateVarSave")                  |
| File           | [core/model/modx/modtemplatevar.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modtemplatevar.class.php) |
| Class          | modTemplateVar                                                                                                                         |
| Method         | public function save($cacheFlag = null)                                                                                                |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
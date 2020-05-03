---
title: "OnTemplateVarBeforeRemove"
_old_id: "464"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ontemplatevarbeforeremove"
---

## Event: OnTemplateVarBeforeRemove

Loaded right before removing a template variable.

- Service: 1 - Parser Service Events
- Group: Template Variables

## Event Parameters

| Name        | Description                                                                                                                                            |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------------------ |
| templateVar | The instance of modTemplateVar class.                                                                                                                  |
| cacheFlag   | Indicates if the saved TV should be cached and optionally, by specifying an integer value, for how many seconds before expiring. Returns always 'true' |

## Remarks

| Previous event | —                                                                                                                                     |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| Next event     | [OnTemplateVarRemove](extending-modx/plugins/system-events/ontemplatevarremove "OnTemplateVarRemove")                                  |
| File           | [core/model/modx/modtemplatevar.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modtemplatevar.class.php) |
| Class          | modTemplateVar                                                                                                                         |
| Method         | public function remove(array $ancestors= array ())                                                                                     |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

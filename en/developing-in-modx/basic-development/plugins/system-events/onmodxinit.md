---
title: "OnMODXInit"
_old_id: "1732"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmodxinit"
---

## Event: OnMODXInit

 Invoked upon initialization of the MODX object.

 Service: 5 - Manager Access Events 
 Group: System

## 

## Event Parameters

 | Name | Description |
|------|-------------|
| contextKey | The context\_key of the context being initialized |
| options | Any options passed to the initialize() function |

## Remarks

 | Previous event | ? |
|----------------|---|
| Next event | ? |
| File | [core/model/modx/modx.class.php](https://github.com/modxcms/revolution/blob/master/core/model/modx/modx.class.php) |
| Class | class modx |
| Method | public function initialize($contextKey= 'web', $options = null) |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")
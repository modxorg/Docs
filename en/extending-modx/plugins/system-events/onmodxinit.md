---
title: "OnMODXInit"
description: "Fires when the MODX object is initialized."
_old_id: "1732"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onmodxinit"
---

## Event: OnMODXInit

Fires when the MODX object is initialized.

- Service: 5 - Template Service Events
- Group: System

## Event Parameters

| Name       | Description                                       |
| ---------- | ------------------------------------------------- |
| contextKey | The context\_key of the context being initialized |
| options    | Any options passed to the initialize() function   |

## Remarks

| File   | [core/src/Revolution/modX.php](https://github.com/modxcms/revolution/blob/3.x/core/src/Revolution/modX.php) |
| ------ | --------------------------------------------------------------------------------------------------------- |
| Class  | MODX\Revolution\modX                                                                                       |
| Method | `public function initialize($contextKey = 'web', $options = null)`                                         |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")

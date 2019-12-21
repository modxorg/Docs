---
title: "modX.getSessionState"
_old_id: "1076"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getsessionstate"
---

## modX::getSessionState

Returns the state of the SESSION being used by modX.

The possible values for session state are:

- `modX::SESSION_STATE_UNINITIALIZED`
- `modX::SESSION_STATE_UNAVAILABLE`
- `modX::SESSION_STATE_EXTERNAL`
- `modX::SESSION_STATE_INITIALIZED`

## Syntax

API Doc: [modX::getSessionState()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getSessionState())

``` php
integer getSessionState ()
```

## Example

``` php
$state = $modx->getSessionState();
```

## See Also

- [modX](extending-modx/core-model/modx "modX")

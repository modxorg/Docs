---
title: "modX.getSessionState"
description: "Returns the state of the SESSION being used by modX."
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

``` php
integer getSessionState ()
```

## Example

``` php
$state = $modx->getSessionState();
```

## See Also

- [modX](extending-modx/core-model/modx "modX")

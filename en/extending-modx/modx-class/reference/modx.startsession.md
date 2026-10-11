---
title: "modX.startSession"
description: "Starts the PHP session when none exists yet"
---

## modX::startSession

Starts PHP's session while the internal state is still `SESSION_STATE_UNINITIALIZED`, then records the new state: `SESSION_STATE_INITIALIZED`, `SESSION_STATE_EXTERNAL` or `SESSION_STATE_UNAVAILABLE`. The return value is `isset($_SESSION)`.

`initialize()` runs it from `_initSession()`, after the session name, cookie parameters and save handler are configured, so an earlier call skips that setup. `modUser::addSessionContext()` calls it as well.

## Syntax

``` php
boolean startSession ()
```

No parameters.

## Example

``` php
if ($modx->startSession()) {
    $_SESSION['staff'] = 'foobar';
}
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.getSessionState](extending-modx/modx-class/reference/modx.getsessionstate)
- [modX.checkSession](extending-modx/modx-class/reference/modx.checksession)

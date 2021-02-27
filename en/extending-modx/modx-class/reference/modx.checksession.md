---
title: "modX.checkSession"
_old_id: "1054"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.checksession"
---

## modX::checkSession

Checks to see if the user has a session in the specified context.

## Syntax

API Doc: [modX::checkSession()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::checkSession())

``` php
boolean checkSession ([string $sessionContext = 'web'])
```

## Example

Check to see if the user has a session in the 'sports' context.

``` php
$modx->checkSession('sports');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")

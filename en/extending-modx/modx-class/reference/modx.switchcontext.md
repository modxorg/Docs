---
title: "modX.switchContext"
_old_id: "1108"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.switchcontext"
---

## modX::switchContext

Switches the primary Context for the modX instance.

Be aware that switching contexts does not allow custom session handling classes to be loaded. The gateway defines the session handling that is applied to a single request. To create a context with a custom session handler you must create a unique context gateway that initializes that context directly.

## Syntax

API Doc: [modX::switchContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::switchContext())

``` php
boolean switchContext (string $contextKey)
```

## Example

Switch to the 'sports' Context.

``` php
$modx->switchContext('sports');
```

## See Also

- [Contexts](building-sites/contexts "Contexts")

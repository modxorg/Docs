---
title: "modX.initialize"
_old_id: "1084"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.initialize"
---

## modX::initialize

Initializes the modX engine into a [Context](building-sites/contexts "Contexts").

This includes preparing the session, pre-loading some common classes and objects, the current site and context settings, extension packages used to override session handling, error handling, or other initialization classes.

## Syntax

API Doc: [modX::initialize()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::initialize())

``` php
void initialize ([string $contextKey = 'web'])
```

## Example

Initialize the 'sports' Context.

``` php
$modx->initialize('sports');
```

## See Also

- [Contexts](building-sites/contexts "Contexts")

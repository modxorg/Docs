---
title: "modX.initialize"
description: "Initializes MODX engine into contexts"
---

## modX::initialize

Initializes MODX engine into a [Context](building-sites/contexts "Contexts").

This includes preparing the session, pre-loading some common classes and objects, the current site and context settings, extension packages used to override session handling, error handling, or other initialization classes.

## Syntax

API Doc: [modX::initialize()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::initialize())

``` php
void initialize ([string $contextKey = 'web'], [$options = null])
```

- `$contextKey` _(string)_ Indicates the context to initialize
- `$options` _(string)_ An array of options for the initialization.

## Example

Initialize the 'sports' Context.

``` php
$modx->initialize('sports');
```

## See Also

- [Contexts](building-sites/contexts "Contexts")

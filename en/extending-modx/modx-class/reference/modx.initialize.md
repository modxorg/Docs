---
title: "modX.initialize"
description: "Initializes MODX engine into contexts"
---

## modX::initialize

Initializes MODX engine into a [Context](building-sites/contexts "Contexts").

This includes preparing the session, pre-loading some common classes and objects, and loading the current site and context settings. It also runs initialization classes that extension packages register to override session handling, error handling or other initialization.


## Syntax

``` php
boolean initialize ([string $contextKey = 'web'], [array|null $options = null])
```

- `$contextKey` _(string)_ Indicates the context to initialize
- `$options` _(array|null)_ An array of options for the initialization

Returns `true` if the context was initialized successfully, or was already initialized; `false` otherwise:

``` php
if (!$modx->initialize('web')) {
    // initialization failed
}
```

## Example

Initialize the 'sports' Context.

``` php
$modx->initialize('sports');
```

## See Also

- [Contexts](building-sites/contexts "Contexts")

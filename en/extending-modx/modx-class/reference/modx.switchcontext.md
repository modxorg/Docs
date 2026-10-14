---
title: "modX.switchContext"
description: "Switches the primary Context of the modX instance"
---

## modX::switchContext

Switches the primary Context for the modX instance.

Switching contexts does not allow custom session handling classes to be loaded. The gateway defines the session handling applied to a single request. To create a context with a custom session handler, create a unique context gateway that initializes that context directly.

## Syntax

``` php
boolean switchContext (string $contextKey, [boolean $reload = false])
```

- `$contextKey` _(string)_ The key of the context to switch to. **required**
- `$reload` _(boolean)_ Set to true to force the context data to be regenerated before being switched to

On a successful switch the new context's configuration array is copied into the instance's placeholders with a `+` prefix (`setPlaceholders($this->config, '+')`). Context config values then become available as `+key` placeholders.

## Example

Switch to the 'sports' Context.

``` php
$modx->switchContext('sports');
```

## See Also

- [Contexts](building-sites/contexts "Contexts")

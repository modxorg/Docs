---
title: "modX.sendError"
_old_id: "1100"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.senderror"
---

## modX::sendError

Send the user to a type-specific core error page and halt PHP execution.

The parameter 'type' can be any field, which will load the template file in core/error. MODx comes prepackaged with 2 default error pages; these are 'unavailable' (the default), and 'fatal'.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::sendError()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendError())

``` php 
void sendError ([string $type = ''], [array $options = array()])
```

## Examples

Send an Unavailable 503 error page.

``` php 
$modx->sendError('unavailable');
```

Send a Fatal 500 error page.

``` php 
$modx->sendError('fatal');
```

## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
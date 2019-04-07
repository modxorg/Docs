---
title: "modX.getResponse"
_old_id: "1074"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getresponse"
---

## modX::getResponse

Attempt to load the response handler class, if not already loaded. Defaults to modResponse.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getResponse()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getResponse())

``` php
boolean getResponse ([$string $class = 'modResponse'], [$path $path = ''])
```

## Example

Load a custom Response handler class called 'myResponse' from '/path/to/myresponse.class.php':

``` php
$modx->getResponse('myResponse','/path/to/');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
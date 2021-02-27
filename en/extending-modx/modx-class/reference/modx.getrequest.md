---
title: "modX.getRequest"
_old_id: "1073"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getrequest"
---

## modX::getRequest

Attempt to load the request handler class, if not already loaded. Defaults to modRequest.

## Syntax

API Doc: [modX::getRequest()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getRequest())

``` php
boolean getRequest ([$string $class = 'modRequest'], [$path $path = ''])
```

## Example

Load a custom Request handler class called 'myRequest' from '/path/to/myrequest.class.php':

``` php
$modx->getRequest('myRequest','/path/to/');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")

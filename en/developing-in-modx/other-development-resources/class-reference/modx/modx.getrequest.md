---
title: "modX.getRequest"
_old_id: "1073"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getrequest"
---

## modX::getRequest

Attempt to load the request handler class, if not already loaded. Defaults to modRequest.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getRequest()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getRequest())

```
<pre class="brush: php">
boolean getRequest ([$string $class = 'modRequest'], [$path $path = ''])

```## Example

Load a custom Request handler class called 'myRequest' from '/path/to/myrequest.class.php':

```
<pre class="brush: php">
$modx->getRequest('myRequest','/path/to/');

```## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
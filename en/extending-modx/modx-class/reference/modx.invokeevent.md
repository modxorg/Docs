---
title: "modX.invokeEvent"
description: "Invokes a specified Event with an optional array of parameters."
_old_id: "1085"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.invokeevent"
---

## modX::invokeEvent

Invokes a specified Event with an optional array of parameters.

## Syntax

``` php
boolean|array invokeEvent (string $eventName, [array $params = array ()])
```

Returns `false` if the event name is empty or the event does not exist. Otherwise it returns an array of the results from the plugins registered for the event.

## Example

Invoke the OnWebPagePrerender event:

``` php
$results = $modx->invokeEvent('OnWebPagePrerender', array(
   'uri' => $_SERVER['REQUEST_URI'],
));
```

## See Also

- [modX](extending-modx/core-model/modx "modX")

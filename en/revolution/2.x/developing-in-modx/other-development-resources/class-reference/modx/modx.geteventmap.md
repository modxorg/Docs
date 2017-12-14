---
title: "modX.getEventMap"
_old_id: "1065"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.geteventmap"
---

modX::getEventMap
-----------------

Gets a map of events and registered plugins for the specified context.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getEventMap()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getEventMap())

```
<pre class="brush: php">
array getEventMap (string $contextKey)

```Example
-------

Get the event map for the current Context.

```
<pre class="brush: php">
$map = $modx->getEventMap();

```See Also
--------

- [modX](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx "modX")
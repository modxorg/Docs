---
title: "modX.removeAllEventListener"
_old_id: "1096"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.removealleventlistener"
---

modX::removeAllEventListener
----------------------------

Remove all registered events for the current request.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::removeAllEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::removeAllEventListener())

```
<pre class="brush: php">
void removeAllEventListener ()

```Example
-------

Eliminate any other events from firing:

```
<pre class="brush: php">
$modx->removeAllEventListener();

```See Also
--------

- [modX](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx "modX")
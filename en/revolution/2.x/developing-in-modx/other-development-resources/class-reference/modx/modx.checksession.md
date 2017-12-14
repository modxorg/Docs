---
title: "modX.checkSession"
_old_id: "1054"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.checksession"
---

modX::checkSession
------------------

Checks to see if the user has a session in the specified context.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::checkSession()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::checkSession())

```
<pre class="brush: php">
boolean checkSession ([string $sessionContext = 'web'])

```Example
-------

Check to see if the user has a session in the 'sports' context.

```
<pre class="brush: php">
$modx->checkSession('sports');

```See Also
--------

- [modX](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx "modX")
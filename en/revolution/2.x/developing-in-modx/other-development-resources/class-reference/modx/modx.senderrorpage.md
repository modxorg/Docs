---
title: "modX.sendErrorPage"
_old_id: "1101"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.senderrorpage"
---

modX::sendErrorPage
-------------------

Send the user to a MODx virtual error page.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::sendErrorPage()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendErrorPage())

```
<pre class="brush: php">
void sendErrorPage ([array $options = null])

```Example
-------

Send the user to the default Error page for the site.

```
<pre class="brush: php">
$modx->sendErrorPage();

```See Also
--------

- [modX](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.sendUnauthorizedPage](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.sendunauthorizedpage "modX.sendUnauthorizedPage")
- [modX.sendForward](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.sendforward "modX.sendForward")
- [modX.sendRedirect](/revolution/2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.sendredirect "modX.sendRedirect")
---
title: "modX.sendUnauthorizedPage"
_old_id: "1104"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.sendunauthorizedpage"
---

## modX::sendUnauthorizedPage

Send the user to the MODX unauthorized page.

## Syntax

API Doc: [modX::sendUnauthorizedPage()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendUnauthorizedPage())

``` php
void sendUnauthorizedPage ([array $options = null])
```

## Example

Send the user to the unauthorized page. You do not need to terminate the script after running this.

``` php
$modx->sendUnauthorizedPage();
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
- [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward "modX.sendForward")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")

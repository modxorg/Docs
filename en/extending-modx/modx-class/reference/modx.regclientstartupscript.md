---
title: "modX.regClientStartupScript"
_old_id: "1094"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartupscript"
---

## modX::regClientStartupScript

 Register JavaScript to be injected inside the HEAD tag of a resource.

## Syntax

 API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::regClientStartupScript()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientStartupScript())

 ``` php 
void regClientStartupScript (string $src, [boolean $plaintext = false])
```

## Example

 Register some JS to the start of the page:

 ``` php 
$modx->regClientStartupScript('assets/js/onload.js');
```

``` php 
$modx->regClientStartupScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"');
```

``` php 
$modx->regClientStartupScript('http://code.jquery.com/jquery-latest.min.js');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientCSS](extending-modx/core-model/modx/modx.regclientcss "modX.regClientCSS")
- [modX.regClientHTMLBlock](extending-modx/core-model/modx/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](extending-modx/core-model/modx/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](extending-modx/core-model/modx/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.getRegisteredClientScripts](extending-modx/core-model/modx/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/core-model/modx/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")
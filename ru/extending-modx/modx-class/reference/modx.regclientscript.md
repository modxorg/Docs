---
title: "modX.regClientScript"
translation: "extending-modx/modx-class/reference/modx.regclientscript"
---

## modX::regClientScript

Регистрирует JavaScript, который будет введен перед закрывающим тегом BODY.

## Синтаксис

API Doc: [modX::regClientScript()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientScript())

``` php
void regClientScript (string $src, [boolean $plaintext = false])
```

## Пример

Добавьте некоторые JS в конец страницы.

``` php
$modx->regClientScript('assets/js/footer.js');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS")
- [modX.regClientHTMLBlock](extending-modx/modx-class/reference/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/modx-class/reference/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")

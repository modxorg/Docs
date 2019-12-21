---
title: "modX.regClientStartupHTMLBlock"
translation: "extending-modx/modx-class/reference/modx.regclientstartuphtmlblock"
---

## modX::regClientStartupHTMLBlock

Регистрирует HTML, который будет введен перед закрывающим тегом HEAD.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::regClientStartupHTMLBlock()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientStartupHTMLBlock())

``` php
void regClientStartupHTMLBlock (string $html)
```

## Пример

Визуализируйте элемент искусственного тега до конца заголовка.

``` php
$modx->regClientStartupHTMLBlock('<tag></tag>');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS")
- [modX.regClientHTMLBlock](extending-modx/modx-class/reference/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/modx-class/reference/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")

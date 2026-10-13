---
title: "modX.regClientHTMLBlock"
description: "Регистрирует HTML, который будет введен перед закрывающим тегом BODY."
translation: "extending-modx/modx-class/reference/modx.regclienthtmlblock"
---

## modX::regClientHTMLBlock

Регистрирует HTML, который будет введен перед закрывающим тегом BODY.

## Синтаксис

``` php
void regClientHTMLBlock (string $html)
```

## Пример

Вставьте нижний колонтитул на страницу.

``` php
$modx->regClientHTMLBlock('<div id="footer">(c) 2009 MODX</div>');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS")
- [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/modx-class/reference/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")

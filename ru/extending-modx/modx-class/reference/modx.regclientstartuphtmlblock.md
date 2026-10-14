---
title: "modX.regClientStartupHTMLBlock"
description: "Регистрирует HTML, который будет введен перед закрывающим тегом HEAD."
translation: "extending-modx/modx-class/reference/modx.regclientstartuphtmlblock"
---

## modX::regClientStartupHTMLBlock

Регистрирует HTML, который будет введен перед закрывающим тегом HEAD.

## Синтаксис

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

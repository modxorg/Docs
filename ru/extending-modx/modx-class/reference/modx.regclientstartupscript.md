---
title: "modX.regClientStartupScript"
description: "Регистрирует JavaScript для внедрения в тег HEAD ресурса."
translation: "extending-modx/modx-class/reference/modx.regclientstartupscript"
---

## modX::regClientStartupScript

Регистрирует JavaScript для внедрения в тег HEAD ресурса.

## Синтаксис

``` php
void regClientStartupScript (string $src, [boolean $plaintext = false])
```

## Пример

Зарегистрируйте несколько JS в начале страницы:

``` php
$modx->regClientStartupScript('assets/js/onload.js');
```

``` php
$modx->regClientStartupScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS")
- [modX.regClientHTMLBlock](extending-modx/modx-class/reference/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.getRegisteredClientScripts](extending-modx/modx-class/reference/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")

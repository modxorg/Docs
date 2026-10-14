---
title: "modX.regClientCSS"
translation: "extending-modx/modx-class/reference/modx.regclientcss"
description: "Регистрирует CSS для внедрения внутри тега HEAD ресурса"
---

## modX::regClientCSS

Регистрирует CSS для внедрения внутри тега HEAD ресурса.

## Синтаксис

``` php
void regClientCSS (string $src, [string $media = null])
```

- `$src` _(string)_ CSS файл, который будет вставлен перед закрывающим тегом HEAD в HTML. **обязательный**
- `$media` _(string)_ Возможные варианты типов: `all`, `aural`, `braille`, `embossed`, `handheld`, `print`, `projection`, `screen`, `tty`, `tv`

## Пример

Зарегистрируйте файл CSS в теге HEAD для `media` с типом 'all':

``` php
$modx->regClientCSS('assets/css/style.css', 'all');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientHTMLBlock](extending-modx/modx-class/reference/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/modx-class/reference/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")

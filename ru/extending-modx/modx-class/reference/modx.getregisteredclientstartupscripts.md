---
title: "modX.getRegisteredClientStartupScripts"
translation: "extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts"
---

## modX::getRegisteredClientStartupScripts

Возвращает все зарегистрированные блоки запуска CSS, JavaScript или HTML.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getRegisteredClientStartupScripts()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getRegisteredClientStartupScripts())

``` php
string getRegisteredClientStartupScripts ()
```

## Пример

Соберите все зарегистрированные скрипты в массив.

``` php
$startupScripts = $modx->getRegisteredClientStartupScripts();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

---
title: "modX.getRegisteredClientScripts"
translation: "extending-modx/modx-class/reference/modx.getregisteredclientscripts"
---

## modX::getRegisteredClientScripts

Возвращает все зарегистрированные блоки JavaScript и HTML.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getRegisteredClientScripts()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getRegisteredClientScripts())

``` php
string getRegisteredClientScripts ()
```

## Пример

Соберите все зарегистрированные скрипты в массив.

``` php
$scripts = $modx->getRegisteredClientScripts();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

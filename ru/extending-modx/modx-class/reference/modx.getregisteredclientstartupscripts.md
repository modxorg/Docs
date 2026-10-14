---
title: "modX.getRegisteredClientStartupScripts"
description: "Возвращает все зарегистрированные блоки запуска CSS, JavaScript или HTML."
translation: "extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts"
---

## modX::getRegisteredClientStartupScripts

Возвращает все зарегистрированные блоки запуска CSS, JavaScript или HTML.

## Синтаксис

``` php
string getRegisteredClientStartupScripts ()
```

## Пример

Получить все зарегистрированные стартовые скрипты одной строкой (записи CSS/JS/HTML, объединённые переводами строки).

``` php
$startupScripts = $modx->getRegisteredClientStartupScripts();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

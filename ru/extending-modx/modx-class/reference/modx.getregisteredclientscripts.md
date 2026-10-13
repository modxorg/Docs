---
title: "modX.getRegisteredClientScripts"
description: "Возвращает все зарегистрированные блоки JavaScript и HTML."
translation: "extending-modx/modx-class/reference/modx.getregisteredclientscripts"
---

## modX::getRegisteredClientScripts

Возвращает все зарегистрированные блоки JavaScript и HTML.

## Синтаксис

``` php
string getRegisteredClientScripts ()
```

## Пример

Получить все зарегистрированные скрипты одной HTML-строкой (записи, объединённые переводами строки).

``` php
$scripts = $modx->getRegisteredClientScripts();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

---
title: "modX.getLoginUserName"
description: "Возвращает текущее имя пользователя для текущего или указанного контекста."
translation: "extending-modx/modx-class/reference/modx.getloginusername"
---

## modX::getLoginUserName

Возвращает текущее имя пользователя для текущего или указанного контекста.

## Синтаксис

``` php
string getLoginUserName ([string $context = ''])
```

## Пример

Получение имя пользователя в текущем контексте.

``` php
$username = $modx->getLoginUserName();
```

## Смотрите также

- [Contexts](building-sites/contexts "Contexts")

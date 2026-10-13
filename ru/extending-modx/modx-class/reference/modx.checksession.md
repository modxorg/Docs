---
title: "modX.checkSession"
description: "Проверяет, есть ли у пользователя сеанс в указанном контексте."
translation: "extending-modx/modx-class/reference/modx.checksession"
---

## modX::checkSession

Проверяет, есть ли у пользователя сеанс в указанном контексте.

## Синтаксис

``` php
boolean checkSession ([string $sessionContext = 'web'])
```

## Пример

Проверьте, есть ли у пользователя сеанс в контексте `sports`.

``` php
$modx->checkSession('sports');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

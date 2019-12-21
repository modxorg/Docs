---
title: "modX.checkSession"
translation: "extending-modx/modx-class/reference/modx.checksession"
---

## modX::checkSession

Проверяет, есть ли у пользователя сеанс в указанном контексте.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::checkSession()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::checkSession())

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

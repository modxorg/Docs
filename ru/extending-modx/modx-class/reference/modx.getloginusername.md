---
title: "modX.getLoginUserName"
translation: "extending-modx/modx-class/reference/modx.getloginusername"
---

## modX::getLoginUserName

Возвращает текущее имя пользователя для текущего или указанного контекста.

## Синтаксис

API Doc: [modX::getLoginUserName()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getLoginUserName())

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

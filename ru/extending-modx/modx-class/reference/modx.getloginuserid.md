---
title: "modX.getLoginUserID"
translation: "extending-modx/modx-class/reference/modx.getloginuserid"
---

## modX::getLoginUserID

Возвращает текущий идентификатор пользователя для текущего или указанного контекста.

## Синтаксис

API Doc: [modX::getLoginUserID()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getLoginUserID())

``` php
string getLoginUserID ([string $context = ''])
```

## Пример

Получить текущий идентификатор пользователя для входа в контекст "sports".

``` php
$id = $modx->getLoginUserID('sports');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

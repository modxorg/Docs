---
title: "modX.getSessionState"
translation: "extending-modx/modx-class/reference/modx.getsessionstate"
---

## modX::getSessionState

Возвращает состояние СЕССИИ, используемой modX.

Возможные значения для состояния сеанса:

- `modX::SESSION_STATE_UNINITIALIZED`
- `modX::SESSION_STATE_UNAVAILABLE`
- `modX::SESSION_STATE_EXTERNAL`
- `modX::SESSION_STATE_INITIALIZED`

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getSessionState()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getSessionState())

``` php
integer getSessionState ()
```

## Пример

``` php
$state = $modx->getSessionState();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

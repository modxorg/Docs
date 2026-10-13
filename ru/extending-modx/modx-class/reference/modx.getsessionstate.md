---
title: "modX.getSessionState"
description: "Возвращает состояние СЕССИИ, используемой modX."
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

``` php
integer getSessionState ()
```

## Пример

``` php
$state = $modx->getSessionState();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

---
title: "modX.getLoginUserID"
description: "Возвращает текущий идентификатор пользователя для текущего или указанного контекста."
translation: "extending-modx/modx-class/reference/modx.getloginuserid"
---

## modX::getLoginUserID

Возвращает текущий идентификатор пользователя для текущего или указанного контекста.

## Синтаксис

``` php
integer getLoginUserID ([string $context = ''])
```

Возвращает ID пользователя как целое число; `0`, если в контексте никто не вошёл.

## Пример

Получить текущий идентификатор пользователя для входа в контекст "sports".

``` php
$id = $modx->getLoginUserID('sports');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

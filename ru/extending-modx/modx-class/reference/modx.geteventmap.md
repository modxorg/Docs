---
title: "modX.getEventMap"
description: "Возвращает карту событий и зарегистрированных плагинов для указанного контекста."
translation: "extending-modx/modx-class/reference/modx.geteventmap"
---

## modX::getEventMap

Возвращает карту событий и зарегистрированных плагинов для указанного контекста.

## Синтаксис

``` php
array getEventMap (string $contextKey)
```

## Пример

Получить карту событий для текущего контекста.

``` php
$map = $modx->getEventMap($modx->context->get('key'));
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

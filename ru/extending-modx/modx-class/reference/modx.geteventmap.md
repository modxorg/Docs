---
title: "modX.getEventMap"
translation: "extending-modx/modx-class/reference/modx.geteventmap"
---

## modX::getEventMap

Возвращает карту событий и зарегистрированных плагинов для указанного контекста.

## Синтаксис

API Doc: [modX::getEventMap()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getEventMap())

``` php
array getEventMap (string $contextKey)
```

## Пример

Получить карту событий для текущего контекста.

``` php
$map = $modx->getEventMap();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

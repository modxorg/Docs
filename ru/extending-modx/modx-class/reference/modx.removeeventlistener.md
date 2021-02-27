---
title: "modX.removeEventListener"
translation: "extending-modx/modx-class/reference/modx.removeeventlistener"
---

## modX::removeEventListener

Удаляет событие из карты событий, чтобы оно не вызывалось.

## Синтаксис

API Doc: [modX::removeEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::removeEventListener())

``` php
boolean removeEventListener (string $event)
```

## Пример

Предотвратить запуск любых событий на `OnChunkRender`:

``` php
$modx->removeEventListener('OnChunkRender');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

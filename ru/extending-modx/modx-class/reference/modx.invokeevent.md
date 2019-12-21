---
title: "modX.invokeEvent"
translation: "extending-modx/modx-class/reference/modx.invokeevent"
---

## modX::invokeEvent

Вызывает указанное событие с необязательным массивом параметров.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::invokeEvent()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::invokeEvent())

``` php
void invokeEvent (string $eventName, [array $params = array ()])
```

## Пример

Вызвать событие `OnChunkRender`:

``` php
$modx->invokeEvent('OnChunkRender',array(
   'id' => $chunk->get('id'),
));
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")

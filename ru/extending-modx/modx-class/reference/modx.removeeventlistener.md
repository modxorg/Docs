---
title: "modX.removeEventListener"
translation: "extending-modx/modx-class/reference/modx.removeeventlistener"
description: "Удалите событие из eventMap, чтобы оно не вызывалось, для всех или для отдельного плагина"
---

## modX::removeEventListener

Удаляет событие из карты событий, чтобы оно не вызывалось.

## Синтаксис

API документация: [modX::removeEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::removeEventListener())

``` php
boolean removeEventListener (string $event, [integer $pluginId = 0])
```

- `$event` _(string)_ Название события, которое вы хотите удалить.  **обязательно**
- `$pluginId` _(integer)_ ID определенного плагина, для которого я хочу удалить событие 

## Примеры

Предотвратить запуск любых событий на `OnChunkRender`:

``` php
$modx->removeEventListener('OnChunkRender');
```

Предотвратить запуск любых событий на 'OnLoadDocument' для плагина с ID = 2

``` php
$modx->removeEventListener('OnLoadDocument', 2);
```

## Смотрите также

- [addEventListener](extending-modx/modx-class/reference/modx.addeventlistener "addEventListener")
- [removeAllEventListener](extending-modx/modx-class/reference/modx.removealleventlistener "removeAllEventListener")
- [modX](extending-modx/core-model/modx "MODX")

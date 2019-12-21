---
title: "modX.addEventListener"
translation: "extending-modx/modx-class/reference/modx.addeventlistener"
---

## modX::addEventListener

Добавляет плагин с  `eventMap` к текущему циклу выполнения.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::addEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::addEventListener())

``` php
boolean addEventListener (string $event, integer $pluginId)
```

## Пример

Добавить плагин с идентификатором 2 к событию `OnChunkPrerender`:

``` php
$modx->addEventListener('OnChunkPrerender',12);
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [Plugins](extending-modx/plugins "Plugins")

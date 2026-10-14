---
title: "modX.addEventListener"
translation: "extending-modx/modx-class/reference/modx.addeventlistener"
description: "Добавляет плагин в карту eventMap к текущему циклу выполнения"
---

## modX::addEventListener

Добавляет плагин в карту `eventMap` к текущему циклу выполнения.

## Синтаксис

API Документация: [modX::addEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::addEventListener())

``` php
boolean addEventListener (string $event, integer $pluginId, [string $propertySetName = ''])
```

- `$event` _(string)_ Имя события **обязательно**
- `$pluginId` _(integer)_ Идентификатор плагина для добавления к событию . **обязателен**
- `$propertySetName` _(string)_ Имя набора свойств, привязанных к плагину.

## Пример

Добавить плагин с идентификатором 12 к событию `OnChunkFormPrerender`:

``` php
$modx->addEventListener('OnChunkFormPrerender', 12);
```

Имя события не проверяется, поэтому слушатель, зарегистрированный для несуществующего или ошибочно написанного события, молча не сработает.

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [Плагины](extending-modx/plugins "Плагины")

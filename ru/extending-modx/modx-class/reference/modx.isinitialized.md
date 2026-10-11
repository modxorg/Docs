---
title: "modX.isInitialized"
translation: "extending-modx/modx-class/reference/modx.isinitialized"
description: "Сообщить, завершился ли initialize() у экземпляра modX"
---

## modX::isInitialized

Возвращает флаг, который `initialize()` устанавливает в true, когда контекст, сеанс, обработчик ошибок и сервисы готовы. Метод только сообщает состояние; он ничего не инициализирует.

## Синтаксис

``` php
boolean isInitialized ()
```

Параметров нет.

## Пример

``` php
if (!$modx->isInitialized()) {
    $modx->initialize('web');
}
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.initialize](extending-modx/modx-class/reference/modx.initialize)

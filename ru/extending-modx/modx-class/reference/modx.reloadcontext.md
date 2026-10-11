---
title: "modX.reloadContext"
translation: "extending-modx/modx-class/reference/modx.reloadcontext"
description: "Обновить данные контекста на месте или загрузить второй контекст"
---

## modX::reloadContext

Без `$key` пересоздаёт текущий контекст через `modX::_initContext()` и обновляет конфигурационные плейсхолдеры `+`. С `$key` загружает этот контекст в `modX::$contexts` — даже если он ещё не загружался — и не переключается на него.

Возвращает false, если ни один контекст не инициализирован и ключ не задан. Процессор обновления ресурса вызывает его из `cleanup()` после сохранения ресурса, если свойство `_reloadContext` не равно false.

## Синтаксис

``` php
boolean reloadContext ([string $key = null])
```

- `$key` _(string)_ контекст для (пере)загрузки; по умолчанию `null` перезагружает текущий

## Пример

``` php
$modx->reloadContext();      // обновить используемый контекст
$modx->reloadContext('mgr'); // загрузить другой контекст, не переключаясь на него
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.switchContext](extending-modx/modx-class/reference/modx.switchcontext)
- [modX.initialize](extending-modx/modx-class/reference/modx.initialize)

---
title: "modX.getContext"
description: "Извлечение контекста по имени, не инициализируя его."
translation: "extending-modx/modx-class/reference/modx.getcontext"
---

## modX::getContext

Извлечение контекста по имени, не инициализируя его.
В запросе контексты, полученные с помощью этой функции, будут кэшировать данные контекста в массив `modX::$contexts`, чтобы избежать многократной загрузки одного и того же контекста.
Если вы просто хотите проверить текущий контекст, вы можете вернуть ключ контекста:

``` php
$modx->context->key;
```

## Синтаксис

``` php
modContext getContext (string $contextKey)
```

## Пример

Получение контекста 'sports'.

``` php
$ctx = $modx->getContext('sports');
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [Contexts](building-sites/contexts)
- [modX.getContext](extending-modx/modx-class/reference/modx.getcontext)

---
title: "modX.getContext"
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

API Doc: [modX::getContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getContext())

``` php
&$modContext getContext (string $contextKey)
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

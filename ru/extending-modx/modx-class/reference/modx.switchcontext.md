---
title: "modX.switchContext"
translation: "extending-modx/modx-class/reference/modx.switchcontext"
---

## modX::switchContext

Переключает основной контекст для экземпляра modX.

Помните, что переключение контекстов не позволяет загружать пользовательские классы обработки сеансов. Шлюз определяет обработку сеанса, которая применяется к одному запросу. Чтобы создать контекст с пользовательским обработчиком сеанса, вы должны создать уникальный контекстный шлюз, который непосредственно инициализирует этот контекст.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::switchContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::switchContext())

``` php
boolean switchContext (string $contextKey)
```

## Пример

Переключитесь на контекст "sports".

``` php
$modx->switchContext('sports');
```

## Смотрите также

- [Contexts](building-sites/contexts "Contexts")

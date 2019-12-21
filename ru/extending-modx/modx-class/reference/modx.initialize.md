---
title: "modX.initialize"
translation: "extending-modx/modx-class/reference/modx.initialize"
---

## modX::initialize

Инициализирует движок modX в [Context](building-sites/contexts "Contexts").

Это включает в себя подготовку сеанса, предварительную загрузку некоторых общих классов и объектов, текущие настройки сайта и контекста, пакеты расширений, используемые для переопределения обработки сеанса, обработки ошибок или других классов инициализации.

## Синтаксис

API Doc: [modX::initialize()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::initialize())

``` php
void initialize ([string $contextKey = 'web'])
```

## Пример

Инициализируйте контекст "sports".

``` php
$modx->initialize('sports');
```

## Смотрите также

- [Contexts](building-sites/contexts "Contexts")

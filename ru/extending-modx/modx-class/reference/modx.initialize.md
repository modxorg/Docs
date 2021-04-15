---
title: "modX.initialize"
translation: "extending-modx/modx-class/reference/modx.initialize"
description: "Инициализирует движок MODX в контекстах"
---

## modX::initialize

Инициализирует движок MODX в [Контекстах](building-sites/contexts "Контекстах").

Это включает в себя подготовку сеанса, предварительную загрузку некоторых общих классов и объектов, текущие настройки сайта и контекста, пакеты расширений, используемые для переопределения обработки сеанса, обработки ошибок или других классов инициализации.

## Синтаксис

API Doc: [modX::initialize()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::initialize())

``` php
void initialize ([string $contextKey = 'web'], [$options = null])
```

- `$contextKey` _(string)_ Указывает контекст для инициализации.
- `$options` _(array)_ Массив опций для инициализации.

## Пример

Инициализируйте контекст "sports".

``` php
$modx->initialize('sports');
```

## Смотрите также

- [Контексты](building-sites/contexts "Контексты")

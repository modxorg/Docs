---
title: "modX.setDebug"
translation: "extending-modx/modx-class/reference/modx.setdebug"
description: "modX.setDebug метод для изменения уровня отладки"
---

## modX::setDebug

Устанавливает функции отладки экземпляра modX.

## Синтаксис

API Doc: [modX::setDebug()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::setDebug())

``` php
boolean|int setDebug ([boolean|int $debug = true])
```

- `$debug` _(string)_ Логическое или целое число, описывающее состояние отладки и/или уровень сообщения об ошибках PHP 

## Пример

Включите режим отладки и скажите, чтобы процесс прекратился, если происходят уведомления:

``` php
$modx->setDebug(true);
```

## Смотрите также

[log_level](building-sites/settings/log_level)
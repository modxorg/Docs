---
title: "modX.setDebug"
translation: "extending-modx/modx-class/reference/modx.setdebug"
description: "modX.setDebug метод для изменения уровня отладки"
---

## modX::setDebug

Устанавливает функции отладки экземпляра modX.

## Синтаксис

``` php
boolean|int setDebug ([boolean|int $debug = true])
```

- `$debug` _(boolean|int)_ Логическое или целое число, описывающее состояние отладки и/или уровень сообщения об ошибках PHP. Также принимаются строки `'true'`, `'false'`, `'0'`, `'-1'` и имена констант, например `'E_ALL'`.

Возвращает **предыдущее** значение отладки, чтобы вызывающий код мог восстановить его позже.

## Пример

Включите режим отладки: сообщения от `LOG_LEVEL_DEBUG` и полный отчёт PHP об ошибках.

``` php
$oldDebug = $modx->setDebug(true);
```

## Смотрите также

[log_level](building-sites/settings/log_level)
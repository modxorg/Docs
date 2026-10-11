---
title: "modX.getFullTableName"
translation: "extending-modx/modx-class/reference/modx.getfulltablename"
description: "Собрать имя таблицы с префиксом и именем базы данных"
---

## modX::getFullTableName

Соединяет опцию `dbname`, точку, префикс таблицы и `$table`. Предназначено для сырых SQL-запросов к таблицам с префиксом, у которых нет модели xPDO, например для миграций.

Результат не экранируется и не заключается в кавычки. Пустой `$table` возвращает только имя базы данных с префиксом.

## Синтаксис

``` php
string getFullTableName ([string $table = ''])
```

- `$table` _(string)_ имя таблицы без префикса, по умолчанию `''`

## Пример

``` php
$table = $modx->getFullTableName('site_content');

// $table === 'modx.modx_site_content' при dbname 'modx' и префиксе 'modx_'
$sql = "SELECT id FROM {$table} WHERE published = 1";
```

## Смотрите также

- [modX](extending-modx/core-model/modx)

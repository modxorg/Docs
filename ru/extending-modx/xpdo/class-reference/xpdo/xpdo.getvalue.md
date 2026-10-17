---
title: "xPDO.getValue"
description: "Получает одно значение из первой строки подготовленного запроса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getvalue"
---

## xPDO::getValue

Выполняет подготовленный `PDOStatement` и возвращает значение одного столбца из первой строки набора результатов. Это удобная обёртка над `PDOStatement::fetchColumn()`, которая также учитывает время выполнения запроса и счётчик выполненных запросов.

## Синтаксис

``` php
mixed getValue (\PDOStatement $stmt, [integer|null $column = null])
```

-   `$stmt` — подготовленный объект `\PDOStatement`.
-   `$column` — номер столбца для получения, начиная с 0. Если не указан или равен `null`, берётся первый столбец.

## Пример

``` php
$stmt = $xpdo->prepare('SELECT COUNT(*) FROM my_table');
$count = $xpdo->getValue($stmt);
```

## Смотрите также

-   [xPDO.prepare](extending-modx/xpdo/class-reference/xpdo/xpdo.prepare "xPDO.prepare")
-   [xPDO.query](extending-modx/xpdo/class-reference/xpdo/xpdo.query "xPDO.query")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")
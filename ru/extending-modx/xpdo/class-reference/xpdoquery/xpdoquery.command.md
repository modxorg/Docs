---
title: "xPDOQuery.command"
description: "Задаёт SQL-команду запроса (SELECT, UPDATE или DELETE)."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.command"
---

## xPDOQuery::command

Задаёт SQL-команду, которую выполнит запрос. Допустимые значения — `SELECT` (по умолчанию), `UPDATE` и `DELETE`. Для `UPDATE` и `DELETE` алиас класса сбрасывается к имени таблицы, поскольку эти инструкции не используют алиасы колонок.

## Синтаксис

```php
xPDOQuery command ([string $command = 'SELECT'])
```

## Пример

```php
$query = $xpdo->newQuery('Box');
$query->command('DELETE');
$query->where(array('width:<' => 10));
$xpdo->exec($query->toSQL());
```

## Смотрите также

-   [xPDOQuery.set](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.set "xPDOQuery.set")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
---
title: "xPDOQuery.join"
description: "Добавляет условие соединения с явным типом join."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.join"
---

## xPDOQuery::join

Добавляет в запрос условие соединения с явным типом join. Выделенные методы [innerJoin()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"), [leftJoin()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin "xPDOQuery.leftJoin") и [rightJoin()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.rightjoin "xPDOQuery.rightJoin") — это короткие формы этого метода.

## Синтаксис

```php
xPDOQuery join (string $class, [string $alias = ''], [string $type = xPDOQuery::SQL_JOIN_CROSS], [mixed $conditions = array()], [string $conjunction = xPDOQuery::SQL_AND], [mixed $binding = null], [integer $condGroup = 0])
```

`$type` принимает константы класса `SQL_JOIN_CROSS`, `SQL_JOIN_LEFT`, `SQL_JOIN_RIGHT`, `SQL_JOIN_NATURAL_LEFT`, `SQL_JOIN_NATURAL_RIGHT` и `SQL_JOIN_STRAIGHT`.

## Пример

```php
$query = $xpdo->newQuery('Box');
$query->join('Owner', 'Owner', xPDOQuery::SQL_JOIN_LEFT, array('Owner.id:=' => 'Box.owner_id'));
```

## Смотрите также

-   [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin")
-   [xPDOQuery.leftJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin "xPDOQuery.leftJoin")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
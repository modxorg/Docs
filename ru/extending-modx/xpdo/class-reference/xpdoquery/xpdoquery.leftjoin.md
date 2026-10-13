---
title: "xPDOQuery.leftJoin"
description: "Добавляет предложение LEFT JOIN к запросу."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin"
---

## xPDOQuery::leftJoin

Добавляет предложение `LEFT JOIN` к запросу.

## Синтаксис

```php
void leftJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = xPDOQuery::SQL_AND], [ $binding = null], [ $condGroup = 0])
```

## Пример

Выберите все коробки и имя владельца.

```php
$query = $xpdo->newQuery('Box');
$query->select($xpdo->getSelectColumns('Box'));
$query->select(array(
  'Owner.name'
));
$query->leftJoin('Owner','Owner');
$boxes = $xpdo->getCollection('Box',$query);
```

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")

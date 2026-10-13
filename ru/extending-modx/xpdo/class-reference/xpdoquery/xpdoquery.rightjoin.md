---
title: "xPDOQuery.rightJoin"
description: "Добавляет оператор RIGHT JOIN в запрос."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.rightjoin"
---

## xPDOQuery::rightJoin

## Синтаксис

```php
void rightJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = xPDOQuery::SQL_AND], [ $binding = null], [ $condGroup = 0])
```

## Пример

```php
$query = $xpdo->newQuery('Box');
$query->rightJoin('Owner','Owner');
$boxes = $xpdo->getCollection('Box',$query);
```

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")

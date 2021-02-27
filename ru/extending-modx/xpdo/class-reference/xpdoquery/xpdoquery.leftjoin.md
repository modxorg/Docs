---
title: "xPDOQuery.leftJoin"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin"
---

## xPDOQuery::leftJoin

Добавляет предложение `LEFT JOIN` к запросу.

## Синтаксис

API Docs: [xPDOQuery::leftJoin()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::leftJoin()>)

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

---
title: "xPDOQuery.rightJoin"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.rightjoin"
---

## xPDOQuery::rightJoin

## Синтаксис

API Docs: [xPDOQuery::rightJoin()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::rightJoin()>)

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

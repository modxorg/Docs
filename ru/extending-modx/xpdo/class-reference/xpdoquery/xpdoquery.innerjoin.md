---
title: "xPDOQuery.innerJoin"
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin"
---

## xPDOQuery::innerJoin

Добавьте в запрос предложение `INNER JOIN`.

## Синтаксис

API Docs: [xPDOQuery::innerJoin()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::innerJoin()>)

```php
void innerJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = xPDOQuery::SQL_AND], [ $binding = null], [ $condGroup = 0])
```

## Пример

Возьмите только коробки с владельцем по имени Марк.

```php
$query = $xpdo->newQuery('Box');
$query->innerJoin('Owner','Owner');
$query->where(array(
   'Owner.name' => 'Mark',
));
$boxes = $xpdo->getCollection('Box',$query);
```

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
